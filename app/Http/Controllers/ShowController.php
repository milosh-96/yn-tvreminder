<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'days' => $this->formValueGenerator(32,1,true),
            'months'=>$this->formValueGenerator(13,1,true),
            'years'=>$this->formValueGenerator(date("Y")+6,date("Y")),
            'hours'=>$this->formValueGenerator(24,0,true),
            'minutes'=>$this->formValueGenerator(60,0,true));
        
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //
    }
}
