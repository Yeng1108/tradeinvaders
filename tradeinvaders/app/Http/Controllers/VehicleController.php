<?php

namespace App\Http\Controllers;
use App\User;
use App\Customer;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // public function storevehicle($id)
    // {
    //     $data = Customer::find($id);
    //     // return view('appraiser.assignvehicle',compact('user', 'userdetails'));
    //     return view('appraiser.assignvehicle')->with('customer', $data);
    // }

    public function store($id)
    {
        $data = request()->validate([

            'carimage' => ['required','image'],
            'unit' => 'required',
            'plateno' => 'required|min:6',
            'brand' => 'required|min:2',
            'variant' => 'required|min:2',
            'yearmodel' => 'required',
            'tvalue' => 'required|min:6',
            'customerprice' => 'required|min:6',
            'mp' => 'required|min:3',
            'grm' => 'required|min:3',
           
        ]);
        $imagePath = request('carimage')->store('vehicles','public');

        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        // $image->save();
        // auth()->user()->customer->vehicles()->create([
        //     'unit' => $data['unit'],
        //     'plateno' => $data['plateno'],
        //     'brand' => $data['brand'],
        //     'variant' => $data['variant'],
        //     'yearmodel' => $data['yearmodel'],
        //     'tvalue' => $data['tvalue'],
        //     'customerprice' => $data['customerprice'],
        //     'mp' => $data['mp'],
        //     'grm' => $data['grm'],
        //     'carimage' => $imagePath
        // ]);
        $customer = Customer::findOrFail($id);
        $vehicle = $customer->vehicles()->create([
            'unit' => $data['unit'],
            'plateno' => $data['plateno'],
            'brand' => $data['brand'],
            'variant' => $data['variant'],
            'yearmodel' => $data['yearmodel'],
            'tvalue' => $data['tvalue'],
            'customerprice' => $data['customerprice'],
            'mp' => $data['mp'],
            'grm' => $data['grm'],
            'carimage' => $imagePath,
        ]);
       

        return redirect('/appraiser/trade-in');
    }

}
