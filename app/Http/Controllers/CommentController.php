<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        Comment::create([
            "user_id" => auth()->user()->id,
            "body"    => $request->body,
            "post_id" => $request->postid,
            "status"  => 0
        ]);

        return redirect()->back()->with("status" , "your comment added admin confirm this to show public");
    }

    public function show(Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
