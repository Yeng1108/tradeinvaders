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

        $data = User::all();
        return view('admin.index',['alluser'=>$data],compact('user'));
    }

    public function dashboard(User $user)
    {
        $data = User::all();
        return view('admin.adminmain',['alluser'=>$data],compact('user'));
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
        return redirect('/admin');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.useredit')->with('user', $user);
    }

    public function update($id)
    {
        $user = User::find($id);
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'acct_type' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update($data);
        return redirect('/admin')->with('Message','Update Success');
    }
    
}
