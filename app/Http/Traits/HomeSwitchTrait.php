<?php 

namespace App\Http\Traits;


trait HomeSwitchTrait {

    public function switcher() {
        if(auth()->user()) {
            $shows = auth()->user()->shows;
            return view('user.library.index')->with(['shows'=>$shows]);
        }
        else {
            return view('layouts.handler');
        }
    }
}
?>