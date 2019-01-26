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

        $user   = User::findorfail($id);
        $status = [1 => 'В работе', 2 => 'На проверке'];

        return view('user.edit', compact('user', 'status'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (isset($request['avatar'])) {
            $ava = $request['avatar'];

            list($type, $ava) = explode(';', $ava);
            list(, $ava)      = explode(',', $ava);

            $ava = base64_decode($ava);

            $photoName = $user->avatar;

            file_put_contents(public_path('images/avatars/users') . '/' . $photoName, $ava);
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
        if (isset($request['iphone'])) {
            $user->update(['iphone' => $request['iphone']]);
        };
        return redirect()->back();
    }

    public function add(Request $data)
    {
        $ava = $data['avatar'];

        list($type, $ava) = explode(';', $ava);
        list(, $ava)      = explode(',', $ava);
        $ava = base64_decode($ava);

        $photoName = $data['login'] . '.' . $data['ava']->getClientOriginalExtension();

        file_put_contents(public_path('images/avatars/users') . '/' . $photoName, $ava);

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
//
//        if(isset($_POST['imagebase64'])){
//            $data = $_POST['imagebase64'];
//
//            list($type, $data) = explode(';', $data['ava']);
//            list(, $data)      = explode(',', $data['ava']);
//            $data = base64_decode($data);
//
//            file_put_contents('image64.png', $data);
//        }
//
//        $data['avatar']->move(public_path('images/avatars/users'), $photoName);

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
