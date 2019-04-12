<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\Controller;

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
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            $serverUrl = 'https://rogov.mrsu.ru/hd?';

            $messageParams = array(
                'message' => "Ehzz",
                'domain'  => "rogov21",
            );

            $queryParams = http_build_query($messageParams);

            file_get_contents($serverUrl . $queryParams);

            return 'ok';
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */

    protected function deadlineMessage()
    {
        $message = "Ehzz";
        Controller::sendMessageToVK($message, 'rogov21');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
