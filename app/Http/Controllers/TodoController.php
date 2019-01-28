<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        Todo::create([
            'name' => $request->name,
            'info' => $request->info,
            'priority' => $request->priority,
            'date' => $request->date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->success = !$todo->success;
        $todo->save();

        return redirect()->back();
    }
}
