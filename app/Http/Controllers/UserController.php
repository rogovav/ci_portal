<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function add(Request $data)
    {
        User::create([
            'fio' => $data['fio'],
            'position' => $data['position'],
            'login' => $data['login'],
            'vk' => $data['vk'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);

        return back()->withInput();
    }

    public function users_json()
    {
        $users = User::all();

        $data = [];

        foreach ($users as $user)
        {
            $data[] = [
                'value' => $user->id,
                'text' => $user->fio,
            ];
        }

        return json_encode($data);
    }
}
