<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\HomeSwitchTrait;


use App\Reminder;
use App\User;
use App\Notifications\ShowReminder;


class HomeController extends Controller
{

    use HomeSwitchTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reminder $rem,User $user)
    {
       // $user->notify(new ShowReminder($show,$rem));
     

       return $this->switcher();
    }
}
