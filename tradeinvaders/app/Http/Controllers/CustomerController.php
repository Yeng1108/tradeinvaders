<?php

namespace App\Http\Controllers;
use App\User;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  

    public function store(User $user)
    {
        

        $data1 = request()->validate([
            'name' => 'required|min:2',
            'contact' => 'required|min:11',
            'Gender' => 'required',
            'birthday' => 'required|date|before:18 years ago',
            'address' => 'required|min:2',
            'baranggay' => 'required|min:3',
            'City' => 'required|min:3',
            'Province' => 'required|min:3',
            
        ]);

       auth()->user()->customer()->create([
            'CustomerName' => $data1['name'],
            'Contact' => $data1['contact'],
            'gender' => $data1['Gender'],
            'birthday' => $data1['birthday'],
            'address' => $data1['address'],
            'baranggay' => $data1['baranggay'],
            'city' => $data1['City'],
            'province' => $data1['Province'],
        ]);

        // return response()->json([
        //     'message' => 'Successfully created customer!',
        //     'customer' => $customer
        // ]);

        // DB::table('customers')->create([
        //     'name' => 'John Doe',
        //     'email' => 'johndoe@example.com',
        //     'password' => Hash::make('password'),
        // ]);
       return redirect('/appraiser/trade-in');
    }
    
}
