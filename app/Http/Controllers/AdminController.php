<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::orderBy("id" , "desc")->take(24)->get();
        $comments = Comment::where("status" , 0)->get();
        $posts = Post::where("status" , 0)->get();
        return view("admin.index" , compact("users" , "comments" , "posts"));
    }

    public function posts(){
        $posts = Post::all();
        return view("admin.posts" , compact("posts"));
    }
}
