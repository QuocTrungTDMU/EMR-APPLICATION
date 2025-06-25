<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelemedicineController extends Controller
{
     public function index()
    {
        return view('partials.Page+.online-consultation-telemedicine');
    }
}
