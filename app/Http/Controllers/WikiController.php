<?php

namespace App\Http\Controllers;

use App\Wiki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WikiController extends Controller
{
    public function index()
    {
        $wikis = Wiki::orderBy('name')->get();
        return view('wiki.index', compact('wikis'));
    }

    public function store(Request $request)
    {
        Wiki::create([
            'name' => $request->name,
            'info' => $request->info,
            'short_info' => $request->short_info,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function show(Request $request, $id)
    {
        $wiki = Wiki::findOrFail($id);

        return view('wiki.show', compact('wiki'));
    }

    public function destroy($id)
    {
        $wiki = Wiki::findOrFail($id);
        $wiki->delete();
        return redirect()->route('wiki.index');
    }

    public function update(Request $request, $id)
    {
        $wiki = Wiki::findOrFail($id);
        $wiki->update([
            'name' => $request->name,
            'info' => $request->info,
            'short_info' => $request->short_info,
        ]);
        return redirect()->back();
    }
}
