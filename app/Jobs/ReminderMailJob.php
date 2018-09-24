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
    protected $reminder;

    public function __construct($reminder)
    {
        $this->reminder = $reminder;
    }
    
    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {
        $reminder = $this->reminder;

        
        Mail::to($reminder->getUser->email)->send(new ReminderMail($this->reminder));    
    }
}
