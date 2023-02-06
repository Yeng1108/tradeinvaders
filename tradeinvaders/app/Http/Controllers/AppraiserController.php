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
            return view('appraiser.index', compact('user'));
        } else {
            $user = User::find(1);
            return view('appraiser.index', compact('user'));
        }
    }
}
