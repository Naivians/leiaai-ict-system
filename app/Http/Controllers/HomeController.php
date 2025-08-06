<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Simulator;


class HomeController extends Controller
{
    function index(Request $request)
    {

        $chartsData = DB::table('simulators')
            ->selectRaw("DATE_FORMAT(MIN(date_occur), '%M %Y') as month_name, COUNT(*) as total")
            ->groupByRaw("DATE_FORMAT(date_occur, '%Y-%m')")
            ->orderByRaw("MIN(date_occur)")
            ->get();

        $month_name = [];
        $values = [];

        foreach($chartsData as $data){
            $month_name[]= $data->month_name;
            $values[] = $data->total;
        }

        //  $month_name[] = "September";
        //  $month_name[] = "October";
        //  $month_name[] = "November";
        //  $month_name[] = "December";

        //  $values[] = 12;
        //  $values[] = 15;
        //  $values[] = 3;
        //  $values[] = 20;

        $today_error = Simulator::whereDate('date_occur', Carbon::today())->count();
        $today_resolve = Simulator::where('status', '1')->count();
        $total_error = Simulator::count();

        $simulator_error = [
            'today_error' => $today_error,
            'total_error' => $total_error,
            'today_resolve' => $today_resolve,
        ];

        $data = [
            'labels' => $month_name,
            'values' => $values
        ];

        return view('main.dashboard', compact('simulator_error', 'data'));
    }
}
