<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('user.edit', compact($user));
    }

    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);

        if (isset($request['avatar'])) {
            $user->update(['avatar' => $request['avatar']]);
        };
        if (isset($request['vk'])) {
            $user->update(['vk' => $request['vk']]);
        };
        if (isset($request['email'])) {
            $user->update(['email' => $request['email']]);
        };
        if (isset($request['phone'])) {
            $user->update(['phone' => $request['phone']]);
        };
        return back()->withInput();
    }

    public function add(Request $data)
    {
        $photoName = $data['login'] . '.' . $data['avatar']->getClientOriginalExtension();

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

        foreach ($users as $user) {
            if (!in_array($user->id, $not_users))
                $data[] = [
                    'value' => $user->id,
                    'text' => "<img src='/images/avatars/users/$user->avatar' class='user-selector'> " . $user->fio,
                ];
        }

        return json_encode($data);
    }
}
