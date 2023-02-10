<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AppraiserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $userdetails = (auth()->user())? auth()->user()->following->contains($user->id) : false;
            return view('appraiser.index', compact('user', 'userdetails'));
        } else {
            // $user = User::find(1);
            // return view('appraiser.index', compact('user'));
        }
    }
    
    public function show(User $user)
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            $userdetails = (auth()->user())? auth()->user()->following->contains($user->id) : false;
            return view('appraiser.tradein', compact('user', 'userdetails'));
        } else {
            // $user = User::find(1);
            // return view('appraiser.index', compact('user'));
        }
    }
    public function addcustomer(User $user)
    {
        $userdetails = (auth()->user())? auth()->user($user->all) : false;
        return view('appraiser.addcustomer',compact('user', 'userdetails'));
    }
    
}
