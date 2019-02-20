<?php

namespace App\Http\Controllers;

use App\Mission;
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

    public function url($url) {
        $mission = Mission::where('short_url', $url)->first();
        if ($mission) {
            return redirect()->route('mission.show', $mission->id);
        } else {
            return redirect()->route('home');
        }

    }

}
