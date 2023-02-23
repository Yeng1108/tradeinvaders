<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function show()
    {
        return view('appraiser.process');
    }
}
