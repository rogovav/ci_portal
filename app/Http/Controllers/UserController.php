<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('fio')->get();
        $positions = Position::orderBy('name')->get();

        return view('user.index', compact('users', 'positions'));
    }

    public function show($id)
    {
        $user           = User::findorfail($id);
        $status         = [1 => 'В работе', 2 => 'На проверке'];
        $from           = [1 => 'Задача', 2 => 'Общежитие', 3 => 'Университет',];
        $mission_owner  = $user->mission_owner->where('status', '<>', 3);
        $mission_worker = $user->mission_worker->where('status', '<>', 3);
        $my             = $mission_owner->count() >= $mission_worker->count();

        return view(Auth::user()->id != $id ? 'user.show' : 'user.edit', compact(
            'user',
            'status',
            'from',
            'mission_owner',
            'mission_worker',
            'my'
        ));
    }

//    public function edit($id)
//    {
//        $user           = User::findorfail($id);
//        $status         = [1 => 'В работе', 2 => 'На проверке'];
//        $from           = [1 => 'Задача', 2 => 'Общежитие', 3 => 'Университет',];
//        $mission_owner  = $user->mission_owner->where('status', '<>', 3);
//        $mission_worker = $user->mission_worker->where('status', '<>', 3);
//        $my             = $mission_owner->count() >= $mission_worker->count();
//
//        return view('user.edit', compact(
//            'user',
//            'status',
//            'from',
//            'mission_owner',
//            'mission_worker',
//            'my'
//        ));
//    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (isset($request['avatar'])) {
            $ava = $request['avatar'];

            list(, $ava) = explode(';', $ava);
            list(, $ava) = explode(',', $ava);

            $ava = base64_decode($ava);

            $photoName = $user->avatar;

            file_put_contents('images/avatars/users/' . $photoName, $ava);
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
        if (isset($request['password'])) {
            $user->update(['password' => Hash::make($request['password'])]);
        };
        if (isset($request['super'])) {
            $user->update(['super' => $request['super']]);
        };
        if (isset($request['blocked'])) {
            $user->update(['blocked' => $request['blocked']]);
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

        file_put_contents('images/avatars/users/' . $photoName, $ava);

        User::create([
            'fio' => $data['fio'],
            'avatar' => $photoName,
            'position' => $data['position'],
            'login' => $data['login'],
            'vk' => $data['vk'],
            'super' => $data['super'],
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
                    'text' => "<img src='/images/avatars/users/$user->avatar' class='user-selector' alt=''> " . $user->fio,
                ];
        }

        return json_encode($data);
    }
}
