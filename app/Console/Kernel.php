<?php

namespace App\Console;

use App\Mission;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


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
        $schedule->call($this->deadlineMessage())
            ->weekdays()
            ->dailyAt('10:00')
            ->timezone('Europe/Moscow');
    }

    /**
     * Register the commands for the application.
     *
     * @return string
     */

    protected function deadlineMessage()
    {
        $missions = Mission::where('status', '<>', 3)->get();

        if ($missions) {
            $missions = $missions->filter(function ($item) {
                return strtotime("now") > strtotime($item->date_to);
            });
        }
        foreach ($missions as $mission)
        {
            // Сообщение о Deadline
            // Автору и Исполнителю

            $message = "&#128219; Deadline просрочен! Заявка №$mission->id " .
                "\n&#127760; Ссылка: " . url("/$mission->short_url");
            $this->sendMessageToVK($message, $mission->owner->vk);
            $this->sendMessageToVK($message, $mission->worker->vk);
        }

        return 'ok';
    }

    protected function sendMessageToVK($message, $user)
    {
        $serverUrl = 'https://rogov.mrsu.ru/hd?';

        $messageParams = array(
            'message' => $message,
            'domain'  => $user,
        );

        $queryParams = http_build_query($messageParams);

        file_get_contents($serverUrl . $queryParams);

        return 'ok';
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
