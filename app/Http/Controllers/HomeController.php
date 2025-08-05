<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Simulator;


class HomeController extends Controller
{
    function index(Request $request)
    {
        $today_error = Simulator::whereDate('date_occur', Carbon::today())->count();
        $total_error = Simulator::count();

        $simulator_error = [
            'today_error' => $today_error,
            'total_error' => $total_error,
        ];

        return view('main.dashboard', compact('simulator_error'));
    }
}
