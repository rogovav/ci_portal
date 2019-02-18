<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index ()
    {
        $users = User::orderBy('fio')->get();

        return view('calendar.index', compact('users'));
    }
}
