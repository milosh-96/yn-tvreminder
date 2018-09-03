<?php

namespace App\Http\Controllers;

use App\Reminder;
use Illuminate\Http\Request;

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
        return view('show.schedule')->with(['formValues'=>(object) $formValues]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Reminder $reminder)
    {
        //
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
    public function destroy(Reminder $reminder)
    {
        //
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
}
