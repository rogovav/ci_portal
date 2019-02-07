<?php

namespace App\Http\Controllers;

use App\Rest;
use App\User;
use Illuminate\Http\Request;

class RestController extends Controller
{
    public function index()
    {
        $rests = Rest::all();
        $users = User::orderBy('fio')->get();

        return view('rest.index', compact('rests', 'users'));
    }

    public function store(Request $request)
    {
        Rest::create([
            'user_id' => $request->user,
            'week1'   => date('Y-m-d', strtotime($request->week1)),
            'week2'   => date('Y-m-d', strtotime($request->week2)),
            'week3'   => date('Y-m-d', strtotime($request->week3)),
            'week4'   => date('Y-m-d', strtotime($request->week4)),
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        Rest::findOrFail($id)->update([
            'user_id' => $request->user,
            'week1'   => date('Y-m-d', strtotime($request->week1)),
            'week2'   => date('Y-m-d', strtotime($request->week2)),
            'week3'   => date('Y-m-d', strtotime($request->week3)),
            'week4'   => date('Y-m-d', strtotime($request->week4)),
        ]);

        return redirect()->back();
    }
}
