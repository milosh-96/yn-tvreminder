<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use \App\Reminder;
use \App\Show;

class Kernel extends ConsoleKernel
{
    /**
    * The Artisan commands provided by your application.
    *
    * @var array
    */
    protected $commands = [
        //
    ];
    
    /**
    * Define the application's command schedule.
    *
    * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
    * @return void
    */
    protected function schedule(Schedule $schedule)
    {
        
        
        $schedule->call(function() {

            $day = strtolower(date("l"));
            $rems = \App\Reminder::where($day,'=',1)->get();
            
            foreach($rems as $rem) {
                $show = $rem->getShow;
                $user = $rem->getUser;
                $user->notify(new \App\Notifications\ShowReminder($show,$rem));
            }
        }
        )->everyMinute();
        
        $schedule->command('inspire')->everyMinute();
        
        
        
        
    }
    
    /**
    * Register the commands for the application.
    *
    * @return void
    */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        
        require base_path('routes/console.php');
    }
}
