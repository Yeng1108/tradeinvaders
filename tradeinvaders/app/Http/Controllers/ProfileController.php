<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user =User::findorfail($user);

        return view('home', [
            'user' => $user
        ]);
    }
   
}
