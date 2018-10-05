<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function __constructor()
    {
        $this->middleware("auth");
    }

   public function library() {
    $shows = auth()->user()->shows;
    return view('user.library.index')->with(['shows'=>$shows]);
   }

   public function edit()
   {
      return view('user.account.edit');
   }

   public function destroy(User $user) {
       $userId = auth()->user()->id;
       $user->destroy($userId);
        Auth::logout();
        session()->flash('msg',"We're sorry to hear you leave. We hope you come back soon.");
        return redirect()->route('index');

   }
   public function confirmDestroy() {
       return view('user.account.delete');
   }
}
