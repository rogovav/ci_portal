<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\Log;


class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('group.index', compact('groups'));
    }

    public function add(Request $request)
    {
        $photoName = str_replace(' ', '_', $request['name']) . '.' . $request['avatar']->getClientOriginalExtension();

        $group = Group::create([
            'name' => $request['name'],
            'admin' => 1,
            'avatar' => $photoName,
        ]);

        $group->hash_id = md5($group->id);
        $group->save();

        $request['avatar']->move(public_path('images/avatars/groups'), $photoName);

        if ($request['users'])
            $this->add_users($request['users'], $group->hash_id);

        return back()->withInput();
    }

    public function show($hash_id)
    {
        $group = Group::where('hash_id', $hash_id)->first();

        if ($group)
            return view('group.show', compact('group'));
        else
            return back()->withInput();
    }

    public function add_users($users, $hash_id)
    {
        $users = array_map('intval', explode(',', $users));
        $group = Group::where('hash_id', $hash_id)->first();
        $group->users()->attach($users);
    }

    public function add_new_users(Request $request)
    {
        $this->add_users($request['users'], $request['hash_id']);
        return back()->withInput();
    }
}
