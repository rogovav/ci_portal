<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request) {
        $users = User::orderBy('fio');
    }
}
