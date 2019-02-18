<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendMessageToVK($message, $user)
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
}
