<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    function index(Request $request)
    {
        // $data = TimeKeeping::with('user')->whereDate('created_at', today())->orderBy('created_at', 'desc');

        // if ($request->ajax()) {
        //     return DataTables::of($data)
        //         ->addColumn('users_name', function ($row) {
        //             return $row->user->name;
        //         })

        //         ->addColumn('total_hours', function ($row) {
        //             if ($row->time_in && $row->time_out) {
        //                 $timeIn = Carbon::parse($row->time_in);
        //                 $timeOut = Carbon::parse($row->time_out);

        //                 $diffInMinutes = $timeOut->diffInMinutes($timeIn);
        //                 $hours = floor($diffInMinutes / 60);
        //                 $minutes = $diffInMinutes % 60;
        //                 return sprintf('%02d:%02d', $hours, $minutes);
        //             }
        //             return '-';
        //         })
        //         ->addColumn('position', function ($row) {
        //             return $row->user->position;
        //         })
        //         ->make(true);
        // }

        return view('main.dashboard');
    }
}
