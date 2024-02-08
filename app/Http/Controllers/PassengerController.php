<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassengerController extends Controller
{
    //
    public function mytrips() {
        return view('passenger.mytrips');
    }
}
