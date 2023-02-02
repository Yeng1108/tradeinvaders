<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
   public function index(){
      if(Auth::check()){
         if(Auth::user()->role == '1'){
            return redirect("/admin");
        }
        else{
         return redirect("/profile");
        }
        
      }
      else{
         return view('auth.login');
      }
   }
  
}
