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

    function generateUrl() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $length = 6;
        $randomUrl = '';
        for ($i = 0; $i < $length; $i++) {
            $randomUrl .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomUrl;
    }
}
