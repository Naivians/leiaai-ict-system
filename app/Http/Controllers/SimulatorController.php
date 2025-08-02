<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    function index(){
        return view('main.simulator.index');
    }
    function forms(){
        return view('main.simulator.form');
    }
}
