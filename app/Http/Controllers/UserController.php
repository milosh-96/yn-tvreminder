<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function library() {
    $shows = auth()->user()->shows;
    return view('user.library.index')->with(['shows'=>$shows]);
   }
}
