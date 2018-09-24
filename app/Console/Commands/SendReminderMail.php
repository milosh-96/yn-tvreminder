<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Reminder;
use App\Show;

use App\Jobs\ReminderMailJob;
use App\Mail\ReminderMail;
use Carbon\Carbon;

class SendReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tvreminder:send-reminder-mail {reminder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();


    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $reminder = Reminder::where('id',$this->argument('reminder'))->with(['getShow','getUser'])->first();
        $job = (new ReminderMailJob($reminder))->delay(Carbon::parse(date("Y-m-d") . " " . $reminder->start_time)->subMinutes(15));//
        dispatch($job);
        print "Reminder with ID of " . $this->argument('reminder') . " and hash " . $reminder->hash . " has been sent successfully. This reminder is associated with the show <<" . $reminder->getShow->title . ">> and that show belongs to user with the ID of " . $reminder->getUser->id . " and his/her user name is " . $reminder->getUser->user_name . "." ;
    }
}
