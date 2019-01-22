<?php

namespace App\Http\Controllers;

use App\Building;
use App\Client;
use App\Mission;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function index()
    {
        $buildings = Building::orderBy('name')->get();
        $clients = Client::orderBy('fio')->get();
        $missions = Mission::all();
        $subjects = Subject::orderBy('name')->get();
        $users = User::orderBy('fio')->get();

        return view('mission.index', compact('buildings', 'clients', 'missions', 'subjects', 'users'));
    }

    public function show()
    {
        return view('mission.show');
    }

    public function store(Request $request)
    {
        $mission = new Mission();

        $mission->from = $request->from;
        $mission->owner_id = Auth::id();
        $mission->worker_id = $request->worker;
        $mission->subject_id = $request->subject;
        $mission->cid = $request->cid;
        $mission->client_id = $request->client;
        $mission->address = $request->address;
        $mission->building_id = $request->building_id;
        $mission->priority = $request->priority;
        $mission->date_from = $request->date_from;
        $mission->date_to = $request->date_to;
        $mission->info = $request->info;
        $mission->status = 1;

        $mission->save();

        return redirect()->back();
    }
}
