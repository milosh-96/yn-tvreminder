<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


use App\Show;
use App\Reminder;

use App\Jobs\ReminderMailJob;
use Mail;

use App\Mail\ReminderMail;

use Carbon\Carbon;





class ReminderController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Show $show,$hash)
    {
        $show = $show->findByHash($hash);
        if(!$show) {
            abort(404);
        }
        $formValues = $this->formValues($show);
        $formValues["weekly_days"][date("w")] = true;
        
        return view('show.schedule')->with(['formValues'=>(object) $formValues]);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Show $show,Request $request,$showHash,$reminderHash = null)
    {
        $show = $show->findByHash($showHash);
       
        
        $hash = substr(Str::uuid($show->title . '-' . auth()->user()->id . '-' . date("Y-m-d H:i")),0,7);
        
        $object = null;
        
        $fields = array("tv"=>$request->tv_channel,"start_time"=>$request->hour . ':' . $request->minute);
        
        if($request->_method == "POST") {
            $fields["hash"] = $hash;
            $fields["show_id"] = $show->id;
            $fields["user_id"] = $show->user_id;
        }
        
        if($request->repeat_type == "weekly") {
            $days = array("monday"=>false,"tuesday"=>false,"wednesday"=>false,"thursday"=>false,"friday"=>false,"saturday"=>false,"sunday"=>false);
            
            foreach($request->days as $day) {
                $days[$day] = true;
            }
            $object = array_merge($fields,$days);
        }   
        $reminder = null;
        switch($request->_method) {
            case "POST":
            $reminder = Reminder::create($object);
            break;
            case "PUT":
            
            $reminder = Reminder::where('hash',$reminderHash)->with(['getShow','getUser'])->update($object);
            $reminder = Reminder::where('hash',$reminderHash)->with(['getShow','getUser'])->first();
            break;
        }
        
             return redirect()->route('index');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Reminder  $reminder
    * @return \Illuminate\Http\Response
    */
    public function show(Reminder $reminder)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Reminder  $reminder
    * @return \Illuminate\Http\Response
    */
    public function edit(Show $show,Reminder $reminder,$showHash,$reminderHash)
    {
        $show = $show->findByHash($showHash);
        if(!$show) {
            abort(404,"the show doesn't exist!");
        }
        $formValues = $this->formValues($show);
        $formValues["reminder"] = $reminder->where("hash","=",$reminderHash)->first();
        $formValues["type"] = "edit";
        $formValues["form_method"] = "PUT";
        $formValues["form_route"] = route("reminder.update",[$show->hash,$formValues["reminder"]->hash]);
        $formValues["weekly_days"]["1"] = $formValues["reminder"]->monday ? true : false;
        $formValues["weekly_days"]["2"] = $formValues["reminder"]->tuesday ? true : false;
        $formValues["weekly_days"]["3"] = $formValues["reminder"]->wednesday ? true : false;
        $formValues["weekly_days"]["4"] = $formValues["reminder"]->thursday ? true : false;
        $formValues["weekly_days"]["5"] = $formValues["reminder"]->friday ? true : false;
        $formValues["weekly_days"]["6"] = $formValues["reminder"]->saturday ? true : false;
        $formValues["weekly_days"]["7"] = $formValues["reminder"]->sunday ? true : false;
        
        $formValues["current_date"]->hour = date("H",strtotime($formValues["reminder"]->start_time));
        $formValues["current_date"]->minute = date("i",strtotime($formValues["reminder"]->start_time));
        $formValues["tv"] = $formValues["reminder"]->tv;
        return view('show.schedule')->with(['formValues'=>(object) $formValues]);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Reminder  $reminder
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Reminder  $reminder
    * @return \Illuminate\Http\Response
    */
    public function destroy(Reminder $reminder,$showHash,$reminderHash)
    {
        $reminder = $reminder->where('hash','=',$reminderHash)->with('getShow')->first();


        session()->flash('msg','Reminder: ' . $reminder->tv . ' @ ' . $reminder->start_time . ' for ' . $reminder->getShow->title . ' has been successfully deleted.');
        $reminder->destroy($reminder->id);
        return redirect()->back();
    }




    private function formValueGenerator($max,$init,$leadingZero = false) {
        $temp_array = array();
        for($i = $init;$i < $max;$i++) {
            if($i < 10 && $leadingZero) {
                $i = "0".$i;
            }
            $temp_array[] = $i;
        }
        return $temp_array;
    }
    
    private function formValues($show) {
        return array(
            "show"=>$show,
            "type"=>"create",
            "form_route"=>route("reminder.store",$show->hash),
            "form_method"=>"POST",
            "days" => $this->formValueGenerator(32,1,true),
            "months"=>$this->formValueGenerator(13,1,true),
            "years"=>$this->formValueGenerator(date("Y")+6,date("Y")),
            "hours"=>$this->formValueGenerator(24,0,true),
            "minutes"=>$this->formValueGenerator(60,0,true),
            "current_date"=>(object) array(
                "year"=>date("Y"),
                "month"=>date("m"),
                "day"=>date("d"),
                "hour"=>date("H"),
                "minute"=>date("i")
            ),
            "day_names"=>array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"),
            "weekly_days"=>array("1"=>false,"2"=>false,"3"=>false,"4"=>false,"5"=>false,"6"=>false,"7"=>false),
            "current_day_in_week"=>date("N"),
            "tv"=>null
            
        );
    }

    public static function upcoming(Reminder $reminder) {
        $current_time = date("H:i");
        $show_time = date("H:i",strtotime($current_time . "+15 minutes"));
        
        $current_day = strtolower(date("l"));

        $reminders = $reminder->where($current_day,true)->where('start_time',$show_time)->with(['getShow','getUser'])->get();
        if(!empty($reminders)) {
            foreach($reminders as $reminder) {
                Mail::to($reminder->getUser->email)->send(new ReminderMail($reminder));
            }
        }
        return $reminders;
    }
}
