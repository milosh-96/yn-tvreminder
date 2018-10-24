<?php

namespace App\Http\Controllers;

use App\Show;
use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;
class ShowController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    
    
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    
    public function index()
    {
        //
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $formValues = array(
            'type'=>"create",
            'form_route'=>route("show.store"),
            'form_method'=>"POST",
            'days' => $this->formValueGenerator(32,1,true),
            'months'=>$this->formValueGenerator(13,1,true),
            'years'=>$this->formValueGenerator(date("Y")+6,date("Y")),
            'hours'=>$this->formValueGenerator(24,0,true),
            'minutes'=>$this->formValueGenerator(60,0,true),
            'current_date'=>(object) array(
                'year'=>date("Y"),
                'month'=>date("m"),
                'day'=>date("d"),
                'hour'=>date("H"),
                'minute'=>date("i")
            ),
            'day_names'=>array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"),
            'weekly_days'=>array(1,2,3,4,5,6,7),
            'current_day_in_week'=>date("N")
        );
        
        return view('user.add-show')->with(['formValues'=>(object) $formValues]);
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
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    private function storeShowInDatabase($request,$type = "create",$show = null) {
        $slug = str_slug($request->title);
        $hash = substr(Str::uuid($request->title . '-' . auth()->user()->id . '-' . date("Y-m-d H:i")),0,7);
        $obj = array_merge($request->except(['_token','_method']),["user_id"=>auth()->user()->id,"hash"=>$hash,"slug"=>$slug,"public"=>$request->public == 1 ? 1 : 0]);
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'cover_url' => 'string'
            ]);
            if($type == "update") {
                $show->title = $request->title;
                $show->description = $request->description;
                $show->cover_url = $request->cover_url;
				$show->public = $request->public == 1 ? 1 : 0;
                $show->save();
                return $show;
            }
            return Show::create($obj);
        }
        public function store(Request $request)
        {
            
            $show = $this->storeShowInDatabase($request);
            session()->flash('msg',$show->title . ' has been successfully added to your library.');
            if(isset($request->schedule) && $request->schedule == true) {
                return redirect()->route('reminder.create',$show->hash);
            }
            return redirect()->route('user.library');
        }
        
        /**
        * Display the specified resource.
        *
        * @param  \App\Show  $show
        * @return \Illuminate\Http\Response
        */
        public function show(Show $show,$hash)
        {
            $show = $show->findByHash($hash);
            if(!$show) {
                abort(404);
            }
            else {
                $view = view('show.display-show')->with(['show'=>$show]);
                if($show->isPublic()) {
                    return $view;
                }
                if(auth()->check()) {
                    if(auth()->user()->id == $show->user_id) {
                        return $view;
                    }
                }
                return redirect()->route('index');
            }
            
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Show  $show
        * @return \Illuminate\Http\Response
        */
        public function edit(Show $show,$hash)
        {
            $show = $show->findByHash($hash);
            $formValues = array(
                'type'=>"update",
                'form_route'=>route("show.update",$show->hash),
                'form_method'=>"PUT"
            );
            return view('user.add-show')->with(['formValues'=>(object) $formValues,'show'=>$show]);
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Show  $show
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, Show $show,$hash)
        {
            $show = $show->findByHash($hash);
            $show = $this->storeShowInDatabase($request,"update",$show);
            session()->flash('msg',$show->title . ' has been successfully updated.');
            if(isset($request->schedule) && $request->schedule == true) {
                return redirect()->route('reminder.create',$show->hash);
            }
            return redirect()->route('user.library');   
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Show  $show
        * @return \Illuminate\Http\Response
        */
        public function destroy(Show $show,$hash)
        {
            $show = $show->findByHash($hash);
            $show->delete();
            session()->flash('msg','<strong>'.$show->title . '</strong> and associated reminders have been deleted!');
            return redirect()->back();
        }
    }
