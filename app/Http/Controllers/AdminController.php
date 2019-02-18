<?php

namespace App\Http\Controllers;

use App\Building;
use App\Client;
use App\Event;
use App\Position;
use App\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $buildings = Building::orderBy('name')->get();
        $clients   = Client::orderBy('fio')->get();
        $subjects  = Subject::orderBy('name')->get();
        $positions  = Position::orderBy('name')->get();

        return view('dashboard.admin', compact('buildings','clients', 'subjects', 'positions'));
    }

    public function building(Request $request)
    {
        Building::updateOrCreate(['id' => $request->id],
            [
                'name'    => $request->name,
                'type'    => $request->type,
                'address' => $request->address
            ]);

        return redirect()->back();
    }

    public function client(Request $request)
    {
        Client::updateOrCreate(['id' => $request->id],
            [
                'fio'    => $request->fio,
                'phone'  => $request->phone,
                'iphone' => $request->iphone,
                'mail'   => $request->mail,
                'info'   => $request->info,
                'cid'    => $request->cid,
            ]);
        return redirect()->back();
    }

    public function subject(Request $request)
    {
        Subject::updateOrCreate(['id' => $request->id], ['name' => $request->name]);
        return redirect()->back();
    }

    public function position(Request $request)
    {
        Position::updateOrCreate(['id' => $request->id], ['name' => $request->name]);
        return redirect()->back();
    }
}
