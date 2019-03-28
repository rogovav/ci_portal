<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('fio')->get();
        foreach ($users as $user) {
            $user->all_missions = $user->mission_worker->where('status', 3)->count();
            $user->end_missions = $user->mission_worker->where('status', 3)->filter(function ($item) {
                return $item->date_close <= $item->date_to;
            })->count();
            $user->end_missions_per = $user->all_missions? round($user->end_missions / $user->all_missions * 100, 1) : 0;
            $user->exp_missions = $user->mission_worker->where('status', 3)->filter(function ($item) {
                return $item->date_close > $item->date_to;
            })->count();
            $user->exp_missions_per = $user->all_missions? round($user->exp_missions / $user->all_missions * 100, 1) : 0;

            $user->all_missions_work = $user->mission_worker->whereIn('status', [1, 2])->count();
            $user->exp_missions_work = $user->mission_worker->whereIn('status', [1, 2])->filter(function ($item) {
                return strtotime("now") > strtotime($item->date_to);
            })->count();
            $user->exp_missions_work_per = $user->all_missions_work? round($user->exp_missions_work / $user->all_missions_work * 100, 1) : 0;
        }
        return view('report.index', compact('users'));
    }
}
