<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    function index(){
        return view('main.sim_form');
    }
}
