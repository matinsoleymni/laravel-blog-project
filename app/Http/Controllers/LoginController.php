<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoginRequest $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "is_admin" => "0",
            "password" => Hash::make($request->password),
        ]);

        return redirect()->route("blog.index");
    }

    public function  check(StoreLoginRequest $request){
        $user = User::where("email",$request->email)->first();
        if($user){
            if(Hash::check($request->password , $user->password)){
                auth()->login($user);
                return redirect()->route("home")->with("status" , "Login Was Successfully");
            }
            return redirect()->route("login.index")->with("status" , "password not true");
        }else {
            return redirect()->route("login.create")->with("status" , "user not found");
        }
    }
}