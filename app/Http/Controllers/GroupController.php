<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Group;
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
        Log::debug($request);

        $users = array_map('intval', explode(',', $request['users']));

        $group = new Group;

        $group->name = $request['name'];
        $group->admin = 1;

        $group->save();

        $group->users()->attach($users);


        return back()->withInput();
    }
}
