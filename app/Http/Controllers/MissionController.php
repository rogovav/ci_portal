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
use Carbon\Carbon;
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
        $missions  = Mission::orderBy('id', 'DESC')->get();
        $subjects  = Subject::orderBy('name')->get();
        $users     = User::orderBy('fio')->get();
        $from      = $this->from;

        return view('mission.index', compact('buildings', 'clients', 'missions', 'subjects', 'users', 'from'));
    }

    public function show($id)
    {
        $mission = Mission::findOrFail($id);
        $users   = User::orderBy('fio')->get();
        $from    = $this->from;
        $status  = $this->status;
        if (strtotime("now") > strtotime($mission->date_to))
        {
            $per = 100;
        } else {
            $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
        }

        return view('mission.show', compact('mission', 'from', 'status', 'per', 'users'));
    }

    public function store(Request $request)
    {
        $mission = new Mission();

        $mission->from        = $request->from;
        $mission->owner_id    = Auth::id();
        $mission->worker_id   = $request->worker;
        if (isset($request->client))
        {
            $client = Client::updateOrCreate(['id' => $request->client],
                [
                    'fio'    => $request->clientFio,
                    'phone'  => $request->clientTel,
                    'iphone' => $request->clientITel,
                    'cid'    => $request->clientCid,
                    'mail'   => $request->clientEmail,
                ]);
            $mission->client_id = $client->id;
        }
        if ($request->subject == -1)
        {
            $subject = Subject::create(['name' => $request->newSubject]);
            $mission->subject_id = $subject->id;
        } else {
            $mission->subject_id = $request->subject;
        }

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

    public function update(Request $request, $id)
    {
        $mission = Mission::findOrFail($id);
        if (isset($request->status))
        {
            $mission->status = $request->status;

            if($request->status == 3)
            {
                MissionComment::create([
                    'info'       => $request->status_info != ''? "Заявка закрыта. \nКомментарий: " . $request->status_info : 'Заявка закрыта.',
                    'user_id'    => Auth::id(),
                    'mission_id' => $id,
                ]);

                $mission->date_close = Carbon::now();
            }
            if($request->status == 2)
            {
                MissionComment::create([
                    'info'       => 'Отправлена на подтверждение закрытия.',
                    'user_id'    => Auth::id(),
                    'mission_id' => $id,
                ]);
            }
            if($request->status == 1)
            {
                MissionComment::create([
                    'info'       => $request->status_info != ''? "Закрытие отменено по причине: \n" . $request->status_info : 'Закрытие отменено без указания причины.',
                    'user_id'    => Auth::id(),
                    'mission_id' => $id,
                ]);
            }

        }

        if (isset($request->date_to))
        {
            $mission->date_to = $request->date_to;
        }

        $mission->save();

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
