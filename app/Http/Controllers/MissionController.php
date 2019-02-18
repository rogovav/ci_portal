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
        $helpers = [];

        foreach ($mission->helpers as $helper) {
            array_push($helpers, $helper->id);
        }
        $helpers = collect($helpers);
        if (strtotime("now") > strtotime($mission->date_to)) {
            $per = 100;
        } else {
            $per = (($mission->date_close ? strtotime($mission->date_close) : strtotime("now")) - strtotime($mission->created_at))/(strtotime($mission->date_to) - strtotime($mission->created_at)) * 100;
        }

        return view('mission.show', compact('mission', 'from', 'status', 'per', 'users', 'helpers'));
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
                $date = new \DateTime();
                $fileName = $mission->id . '_' . $date->format('Ymd_His') . '_' . $original;

                $file->storeAs('public/missions', $fileName);

                MissionFile::create([
                    'name' => $fileName,
                    'original' => $original,
                    'mission_id' => $mission->id
                ]);
            }
        }

        $mission->helpers()->sync($request->helper);


        // Сообщение о новой заявке
        // Исполнителю

        $helpersFio = "";

        foreach ($mission->helpers as $helper)
        {
            $helpersFio .= $helper->fio . " ";

            $message = "&#128101; Вы назначены помощником к заявке №$mission->id " .
                "\n&#128100; Автор: " . Auth::user()->fio .
                "\n&#128100; Исполнитель: " . $mission->worker->fio .
                "\n&#128221; Описание: $request->info ".
                "\n&#127760; Ссылка: " . route('mission.show', $mission->id);
            $this->sendMessageToVK($message, $helper->vk);
        }

        $message = "&#127381; Новая заявка №$mission->id" .
            "\n&#128100; Автор: " . Auth::user()->fio .
            ($helpersFio? "\n&#128101; Помощники: $helpersFio" : "") .
            "\n&#128197; Deadline: " . date('Y-m-d H:i', strtotime($request->date_to)) .
            "\n&#128221; Описание: $request->info " .
            "\n&#127760; Ссылка: " . route('mission.show', $mission->id);

        $this->sendMessageToVK($message, $mission->worker->vk);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $mission = Mission::findOrFail($id);

        // изменение статуса заявки
        if (isset($request->status))
        {
            $mission->status = $request->status;

            // Сообщение о закрытии
            if($request->status == 3)
            {
                $info = $request->status_info != ''? "Заявка закрыта. \nКомментарий: " . $request->status_info : 'Заявка закрыта.';
                $mission->date_close = Carbon::now();

                $message = "&#10004; Заявка №$id успешно закрыта" .
                    "\n&#127760; Ссылка: " . route('mission.show', $id);

                $this->sendMessageToVK($message, $mission->worker->vk);
                $this->sendMessageToVK($message, $mission->owner->vk);
                foreach ($mission->helpers as $helper)
                {
                    $this->sendMessageToVK($message, $helper->vk);
                }
            }

            // запросе на закрытие
            if($request->status == 2)
            {
                $info = 'Отправлена на подтверждение закрытия.';
                $message = "&#128591; Запрос на закрытие заявки №$id " .
                    "\n&#128100; Исполнитель: " . Auth::user()->fio .
                    "\n&#127760; Ссылка: " . route('mission.show', $id);
                $this->sendMessageToVK($message, $mission->owner->vk);
            }

            // отклонении запроса на закрытие
            if($request->status == 1)
            {
                $info = $request->status_info != ''? "Закрытие отменено по причине: \n" . $request->status_info : 'Закрытие отменено без указания причины.';
                $message = "&#10060; Запрос на закрытие заявки №$id отклонен" .
                    "\n&#128221; Причина: " . ($request->status_info != ''? $request->status_info : 'Причина не указана') .
                    "\n&#127760; Ссылка: " . route('mission.show', $id);
                $this->sendMessageToVK($message, $mission->worker->vk);
            }
        }

        // изменениие Deadline
        if (isset($request->date_to))
        {
            $mission->date_to = $request->date_to;
            $info = "Deadline изменен на: " . date('Y-m-d H:i', strtotime($request->date_to));

            $message = "&#9200; В заявке №$id изменен Deadline" .
                "\n&#128197; Deadline: " . date('Y-m-d H:i', strtotime($request->date_to)) .
                "\n&#127760; Ссылка: " . route('mission.show', $id);

            $this->sendMessageToVK($message, $mission->worker->vk);
        }

        // изменениие рабочей группы
        if (isset($request->worker))
        {
            $mission->worker_id = $request->worker;
            $mission->helpers()->sync($request->helper);
        }

        $mission->save();

        MissionComment::create([
            'info'       => $info,
            'user_id'    => Auth::id(),
            'mission_id' => $id,
        ]);

        return redirect()->back();
    }

    public function storeComment(Request $request, $id)
    {
        $comment = MissionComment::create([
            'info'       => $request->info,
            'user_id'    => Auth::id(),
            'mission_id' => $id,
        ]);


        // Сообщение о Deadline
        // Автору и Исполнителю

        $message = "&#128219; Deadline! Заявка №$id " .
            "\n&#127760; Ссылка: " . route('mission.show', $id);


        // Сообщение о новом комментарии
        // Всем кроме автора комментария

        $message = "&#9993; Комментарий! Заявка №$id " .
            "\n&#128100; Автор: " . Auth::user()->fio .
            "\n&#128221; Текст: $request->info ".
            "\n&#127760; Ссылка: " . route('mission.show', $id);

        $mission = Mission::find($id);
        Auth::user() != $mission->worker? $this->sendMessageToVK($message, $mission->worker->vk) : Null;
        Auth::user() != $mission->owner? $this->sendMessageToVK($message, $mission->owner->vk) : Null;
        foreach ($mission->helpers as $helper)
        {
            Auth::user() != $helper? $this->sendMessageToVK($message, $helper->vk) : Null;
        }

        // Сообщение о изменении рабочей группы
        // Новому и старому исполнителям
        // Новым помощникам и старым

        if ($request->hasFile('commentFiles'))
        {
            foreach ($request->file('commentFiles') as $file)
            {
                $original = $file->getClientOriginalName();
                $date = new \DateTime();
                $fileName = $comment->id . '_' . $date->format('Ymd_His') . '_' . $original;

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
