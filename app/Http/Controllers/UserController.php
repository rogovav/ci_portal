<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function add(Request $data)
    {
        $photoName = $data['login'].'.'.$data['avatar']->getClientOriginalExtension();

        User::create([
            'fio' => $data['fio'],
            'avatar' => $photoName,
            'position' => $data['position'],
            'login' => $data['login'],
            'vk' => $data['vk'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);

        $data['avatar']->move(public_path('images/avatars/users'), $photoName);

        return back()->withInput();
    }

    public function api_json(Request $params)
    {
        $users = User::all();

        $data = [];

        $not_users = array_map('intval', explode(',', $params['users']));

        foreach ($users as $user)
        {
            if (!in_array($user->id, $not_users))
                $data[] = [
                    'value' => $user->id,
                    'text' => "<img src='/images/avatars/users/$user->avatar' class='user-selector'> " . $user->fio,
                ];
        }

        return json_encode($data);
    }
}
