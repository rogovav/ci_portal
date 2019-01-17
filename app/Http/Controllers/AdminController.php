<?php

namespace App\Http\Controllers;

use App\Building;
use App\Client;
use App\Event;
use App\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        $clients   = Client::all();
        $events    = Event::all();
        $subjects  = Subject::all();

        return view('dashboard.admin', compact('buildings','clients', 'events', 'subjects'));
    }

    public function building(Request $request)
    {
        if($request->id)
        {

        }
        return redirect()->back();
    }

    public function client(Request $request)
    {
        if($request->id)
        {

        }
        return redirect()->back();
    }

    public function event(Request $request)
    {
        if($request->id)
        {

        }
        return redirect()->back();
    }

    public function subject(Request $request)
    {
        if($request->id)
        {

        }
        return redirect()->back();
    }
}
