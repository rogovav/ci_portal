<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        foreach ($user->todos as $todo)
        {
            if (strtotime(date('Y - m - d')) > strtotime($todo->date))
            {
                Todo::findOrFail($todo->id)->delete();
            }
        }

        return redirect()->route('user.show', Auth::id());
    }

}
