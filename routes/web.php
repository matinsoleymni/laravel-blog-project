<?php

use App\Models\Comment;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use \App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;


Route::get("/" , [HomeController::class , "index"])->name("home");
Route::resource("posts" , PostController::class);
Route::post("/comment" , [CommentController::class , "store"])->name("comment.add");
Route::post("/comment/ok/{comment}" , [CommentController::class , "ok"])->name("comment.ok");

/* Login ... */
Route::resource("login" , LoginController::class);
Route::get("/register" , [LoginController::class , "create"])->name("login.create");
Route::get("/contact" , [HomeController::class , "contact"])->name("contact");
Route::post("/login/check" , [LoginController::class , "check"])->name("login.check");
Route::get("/userpanel" , function(){
   return "UserPanel";
})->name("panel.user")->middleware("auth");
Route::get("/logout" , function(){
   auth()->logout();
   return redirect()->route("home");
})->name("auth.logout")->middleware("auth");
/* END */


/* Admin Panel */
Route::middleware(isAdmin::class)->prefix('panel')->group(function () {
   Route::get("/" , [AdminController::class , "index"])->name("panel.index");
   Route::get("/posts" , [AdminController::class , "posts"])->name("panel.posts");
});

Route::post("/posts/ok/{post}" , [PostController::class , "ok"])->name("posts.ok");
Route::post("/posts/hide/{post}" , [PostController::class , "hide"])->name("posts.hide");