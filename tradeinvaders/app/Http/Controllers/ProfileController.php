<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function index($user)
    public function index(User $user)
    {
        // $user =User::findorfail($user);

        // return view('home', [
        //     'user' => $user
        // ]);
        return view("profiles.index", compact('user'));

    }
   
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view("profiles.edit", compact('user'));
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile','public');
            $imageArray = ['image' => $imagePath];
        }

       auth()-> user()->profile->update(array_merge(
        $data,
        $imageArray ?? []
       ));
        return redirect("/profile/{$user->id}");
    }
}
