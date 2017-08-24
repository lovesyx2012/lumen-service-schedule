<?php

namespace App\Console;
use App\Console\Commands\Sms;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Sms::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
        $schedule->call(function () {
            file_put_contents("/vagrant_data/github/lumen-service-schedule/log.txt","AAAA",FILE_APPEND);
        })->everyMinute();
        */
        $schedule->command('tasks:sms.daily')->everyMinute();
    }
}
