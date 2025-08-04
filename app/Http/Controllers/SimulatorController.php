<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulator;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class SimulatorController extends Controller
{
    public function index()
    {

        $datas = Simulator::orderBy('date_occur', 'desc')->get();
        // $sim_contents = '';
        // foreach ($datas as $data) {
        //     $date_happend = new DateTime($data->date_occur);
        //     $date_fixed = new DateTime($data->date_fixed);

        //     $sim_contents .= '
        //     <div class="col-md-12 mb-4 shadow-sm border">
        //         <section class="p-2">
        //             <div class="d-flex align-items-center gap-2">
        //                 <div class="col-md-6 border rounded shadow-sm p-3">
        //                     <div class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
        //                         <div>
        //                             <div class="col-md-12">
        //                                 <span class="text-secondary">Date Happened:
        //                                     <span class="fw-bold badge text-bg-warning">' . $date_happend->format('M j, Y h:i:s A') . '</span>
        //                                 </span>
        //                             </div>
        //                             <div class="col-md-12">
        //                                 <span class="text-secondary">
        //                                     Complainant Name:
        //                                     <span class="fw-bold badge text-bg-warning">' . $data->c_name . '</span>
        //                                 </span>
        //                             </div>
        //                         </div>
        //                         <span class="badge text-bg-warning me-3">Complaint</span>
        //                     </div>
        //                     <div class="maintenance_content text-muted">
        //                         ' .  $data->issue_text . '
        //                     </div>
        //                 </div>
        //                 <div class="col-md-6 border rounded shadow-sm p-3">
        //                     <div class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
        //                         <div>
        //                             <div class="col-md-12">
        //                                 <span class="text-secondary"> Date Fixed:
        //                                     <span class="fw-bold badge text-bg-primary">' . $date_fixed->format('M j, Y h:i:s A') . '</span>
        //                                 </span>
        //                             </div>
        //                             <div class="col-md-12">
        //                                 <span class="text-secondary">
        //                                     Technician:
        //                                     <span class="fw-bold badge text-bg-primary">' . $data->t_name . '</span>
        //                                 </span>
        //                             </div>
        //                         </div>
        //                         <span class="badge text-bg-primary me-3">Corrective Action</span>
        //                     </div>
        //                     <div class="maintenance_content text-muted">
        //                     ' . $data->solution_text . '
        //                     </div>

        //                 </div>
        //             </div>
        //             <div class=" mb-1 mt-2">
        //                 <a href="#" class="btn btn-outline-warning">
        //                     <i class="fa-solid fa-pen-to-square"></i>
        //                     Edit
        //                 </a>
        //                 <a href="#" class="btn btn-outline-danger">
        //                     <i class="fa-solid fa-trash"></i>
        //                     Delete
        //                 </a>
        //                 <a href="#" class="btn btn-outline-info">
        //                     <i class="fa-solid fa-print"></i>
        //                     Print
        //                 </a>
        //             </div>
        //         </section>
        //     </div>
        //     ';
        // }

        return view('main.simulator.index', compact('datas'));
    }

    function forms()
    {
        return view('main.simulator.form');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'c_name' => 'required|string',
            'sim_type' => 'required|string',
            'issue_text' => 'required|string',
        ]);

        if ($validation->fails()) {
            $this->json_respone($validation->errors()->first(), false);
        }

        $sim = Simulator::create([
            'c_name' => $request->c_name,
            'issue_text' => $request->issue_text,
            'sim_type' => $request->sim_type,
        ]);

        if (!$sim) {
            return $this->json_respone("Failed to record simulator error", false);
        }

        return $this->json_respone("Issue submitted successfully", true);
    }

    public function showForm($report_id)
    {

        try {
            $decryptedId = Crypt::decrypt($report_id);
        } catch (DecryptException $e) {
            return view('main.simulator.index');
        }

        $sim_data = Simulator::findOrfail($decryptedId);

        if (!$sim_data) {
            return view('main.simulator.index');
        }

        return view('main.simulator.view_edit', compact('sim_data'));
    }

    public function updateForm(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'solution_text' => 'required|string',
        ]);

        if ($validation->fails()) {
            return  $this->json_respone($validation->errors()->first(), false);
        }

        $sim = Simulator::find($request->report_id);

        if (!$sim) {
            return $this->json_respone("Report Id do not exist", false);
        }

        $res = $sim->update([
            't_name' => "Capt. Adecer",
            'solution_text' => $request->solution_text,
            'date_fixed' => now(),
            'status' => 1,
        ]);

        if (!$res) {
            return $this->json_respone("Failed to update report", false);
        }

        return $this->json_respone("Submitted Successsfully", true);
    }

    public function deleteForm($report_id)
    {
        $report_id = Simulator::findOrFail($report_id);
        if ($report_id) {
            return $this->json_respone("Report Id do not exist", false);
        }
    }


    function json_respone($message, $status)
    {
        return response()->json([
            'success' => $status ?? false,
            'message' => $message ?? 'no data pass'
        ]);
    }
}
