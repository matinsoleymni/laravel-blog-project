<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("id" , "desc")->get();
        $comments = Comment::orderBy("id" , "desc")->get();
        return view("blog.index" , compact("posts" , "comments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // $filename = now().$request->file->extension;
        // dd($filename);
        // $request->image->move(public_path('images') , );
        Post::create([
            // "image" => null,
            "title" => $request->title,
            "description" => $request->description,
            "body"  => $request->body,
            "user_id" => auth()->user()->id,
            "status" => 0
        ]);

        return redirect()->route("panel.posts");
    }

    public function ok(Post $post){
        $post->update([
            "status" => 1,
        ]);
        return redirect()->route("panel.index");
    }

    public function hide(Post $post){
        $post->update([
            "status" => 0
        ]);
        return redirect()->route("panel.posts");
    }

    public function show(Post $post)
    {
        return view("blog.show" , compact("post"));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("panel.posts");
    }
}
