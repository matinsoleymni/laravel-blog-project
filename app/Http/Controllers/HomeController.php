<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {

        $posts    = Post::where("status" , 1)->orderBy("id" , "desc")->take(3)->get();
        $comments = Comment::where("status" , 1)->orderBy("id" , "desc")->take(3)->get();
        return view("index" , compact('posts' , 'comments'));
    }

    public function contact(){
        return "contact";
    }
}
