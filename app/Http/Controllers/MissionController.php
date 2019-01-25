<?php

namespace App\Http\Controllers;

use App\Building;
use App\Client;
use App\Mission;
use App\MissionComment;
use App\MissionCommentFile;
use App\MissionFile;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public $from = [1 => 'Задача',
                    2 => 'Общежитие',
                    3 => 'Университет',];

    public $status = [1 => 'В работе',
                      2 => 'На проверке',
                      3 => 'Выполнена',];

    public function index()
    {
        $buildings = Building::orderBy('name')->get();
        $clients   = Client::orderBy('fio')->get();
        $missions  = Mission::all();
        $subjects  = Subject::orderBy('name')->get();
        $users     = User::orderBy('fio')->get();

        return view('mission.index', compact('buildings', 'clients', 'missions', 'subjects', 'users'));
    }

    public function show($id)
    {
        $mission = Mission::findOrFail($id);
        $from = $this->from;
        $status = $this->status;
        $per = (strtotime("now") - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
        $users     = User::orderBy('fio')->get();

        return view('mission.show', compact('mission', 'from', 'status', 'per', 'users'));
    }

    public function store(Request $request)
    {
        $mission = new Mission();

        $mission->from        = $request->from;
        $mission->owner_id    = Auth::id();
        $mission->worker_id   = $request->worker;
        $mission->subject_id  = $request->subject;
        $mission->cid         = $request->cid;
        $mission->client_id   = $request->client;
        $mission->address     = $request->address;
        $mission->building_id = $request->building;
        $mission->priority    = $request->priority;
        $mission->date_to     = $request->date_to;
        $mission->info        = $request->info;

        $mission->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $original = $file->getClientOriginalName();
                $fileName = $mission->id . '_' . $original;

                $file->storeAs('public/missions', $fileName);

                MissionFile::create([
                    'name' => $fileName,
                    'original' => $original,
                    'mission_id' => $mission->id
                ]);
            }
        }

        $mission->helpers()->sync($request->helper);

        return redirect()->back();
    }

    public function storeComment(Request $request, $id)
    {
        $comment = MissionComment::create([
            'info'       => $request->info,
            'user_id'    => Auth::id(),
            'mission_id' => $id,
        ]);

        if ($request->hasFile('commentFiles'))
        {
            foreach ($request->file('commentFiles') as $file)
            {
                $original = $file->getClientOriginalName();
                $fileName = $comment->id . '_' . $original;

                $file->storeAs('public/comments', $fileName);

                MissionCommentFile::create([
                    'name'       => $fileName,
                    'original'   => $original,
                    'comment_id' => $comment->id
                ]);
            }
        }

        return redirect()->back();
    }
}
