<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LoginController;

Route::get("/" , [HomeController::class , "index"])->name("home");
Route::resource("blog" , PostController::class);
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