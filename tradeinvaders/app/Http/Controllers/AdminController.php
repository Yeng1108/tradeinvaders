<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(User $user)
    {
        // $user =User::findorfail($user);

        // return view('home', [
        //     'user' => $user
        // ]);
        // $follows = (auth()->user())? auth()->user()->following->contains($user->id) : false;
        // return view("admin.index", compact('user', 'follows'));
        $data = User::all();
        return view('admin.index',['alluser'=>$data],compact('user'));
    }
    
}
