<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function store(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'acct_type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        auth()->user()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'address' => $data['address'],
            'department' => $data['department'],
            'acct_type' => $data['acct_type'],
            'password' => Hash::make($data['password']),
        ]);

        $passuser = User::all();
        return view('admin.index',['alluser'=>$passuser],compact('user'));
    }
    
    
}
