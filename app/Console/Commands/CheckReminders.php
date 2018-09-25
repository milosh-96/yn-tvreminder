<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;


use App\Reminder;

class CheckReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tvreminder:check-reminders';

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
        $time_range['from'] = date("H:i",strtotime("-15 minutes"));
        $time_range['to'] = date("H:i",strtotime("+15 minutes"));
        // $reminders = Reminder::where('start_time','=',$time_range['from'])->get();

        $reminders = Reminder::all();
         print("We have found ".count($reminders) . " reminders available at this time!");

         foreach($reminders as $reminder) {
             Artisan::call("tvreminder:send-reminder-mail",["reminder"=>$reminder->id]);
         }
    }
}
