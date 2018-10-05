<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\ConsoleOutput;


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
    public function handle(Reminder $reminder)
    {
        $output = new ConsoleOutput();
       $reminders = \App\Http\Controllers\ReminderController::upcoming($reminder);
       $output->writeln("Hey, we got " . count($reminders)." reminders");
    }
}
