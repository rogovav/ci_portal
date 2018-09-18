<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\GroupPost;
use App\GroupPostComment;

class GroupPostController extends Controller
{
    public function add_post(Request $request)
    {
        GroupPost::create([
            'subject' => $request['subject'],
            'text' => $request['text'],
            'user_id' => 1,
            'group_id' => $request['group_id'],
        ]);
        return back()->withInput();
    }

    public function add_comment(Request $request)
    {
        $post_comment = new GroupPostComment(['user_id' => 1, 'text' => $request['text']]);

        $post = GroupPost::find($request['post_id']);
        $post -> comments() -> save($post_comment);

        return back()->withInput();
    }

}
