<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Show;
use App\Reminder;
use App\Mail\ReminderMail;
use Caron\Carbon;

class ReminderMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
    * Create a new job instance.
    *
    * @return void
    */
    public function __construct()
    {
        //
    }
    
    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {
        $show = Show::find(1)->first();
        $rem = Reminder::find(2)->first();
        
        Mail::to("ddd@ddd.com")->send(new ReminderMail);    
    }
}
