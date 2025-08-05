<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulator;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Carbon;
use setasign\Fpdi\Tcpdf\Fpdi;

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

        $sim_data = [
            'c_name' => $request->c_name,
            'issue_text' => $request->issue_text,
            'sim_type' => $request->sim_type,
        ];



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

    public function sortBySimulator(Request $request)
    {
        $datas = Simulator::all()->where('sim_type', $request->sim_sort);
        $sim_contents = '';
        $restriction = '';


        foreach ($datas as $data) {
            $redirects = route('sim.show', ['report_id' => Crypt::encrypt($data->id)]);
            $generateReport = route('sim.generate-pdf', ['report_id' => $data->id]);

            if (Gate::allows('technician')) {
                $restriction = '
                <div class=" mb-1 mt-2">
                                <a href="' . $redirects . '"
                                    class="btn btn-outline-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                                <a href="' . $generateReport . '" target="_blank" class="btn btn-outline-info">
                                                <i class="fa-solid fa-print"></i>
                                                Print
                                            </a>
                            </div>

                ';
            }

            $date_happend = new DateTime($data->date_occur);
            $statusName = $data->status == 0 ? 'Unresolve' : 'Completed';
            $statusClass = $data->status == 0 ? 'alert-warning' : 'alert-success';
            $statusColor = $data->status == 0 ? 'text-bg-danger' : 'text-bg-success';
            $t_name = $data->t_name ?? "Not assigned";
            $date_fixed = $data->date_fixed ? \Carbon\Carbon::parse($data->date_fixed)->format('M j Y h:i:s A') : 'Tentative';

            $sim_contents .= '
            <div class="col-md-12 mb-4 shadow-sm border">
                    <section class="p-2">
                        <div class="text-center m-0 mb-1 border border-1 p-2">
                            <span class ="fw-bold badge ' . $statusColor . '">Status: ' . $statusName . '</span>
                            <span class ="fw-bold badge text-bg-info">Sim-type: ' . $data->sim_type . '</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div class="border  shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Time of Incident:
                                                <span
                                                    class="fw-bold badge text-bg-warning">' . $date_happend->format("M j, Y h:i:s A") . '</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Reported By:
                                                <span class="fw-bold badge text-bg-warning"> ' . $data->c_name . ' </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-warning me-3">Discrepancy</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    ' . $data->issue_text . '
                                </div>
                            </div>
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div
                                    class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Date Fixed:
                                                <span
                                                    class="fw-bold badge text-bg-primary">' . $date_fixed . '</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Attending Technician:
                                                <span class="fw-bold badge text-bg-primary">
                                                    ' . $t_name . '
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-primary me-3">Corrective Actions</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    ' . $data->solution_text . '
                                </div>
                            </div>
                        </div>
                        ' . $restriction . '
                    </section>
                </div>

            ';
        }

        return $this->json_respone($sim_contents, true);
    }

    public function sortByStatus(Request $request)
    {
        $datas = Simulator::all()->where('status', $request->status);
        $sim_contents = '';
        $restriction = '';


        foreach ($datas as $data) {
            $redirects = route('sim.show', ['report_id' => Crypt::encrypt($data->id)]);
            $generateReport = route('sim.generate-pdf', ['report_id' => $data->id]);

            if (Gate::allows('technician')) {
                $restriction = '
                <div class=" mb-1 mt-2">
                                <a href="' . $redirects . '"
                                    class="btn btn-outline-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                                <a href="' . $generateReport . '" target="_blank" class="btn btn-outline-info">
                                                <i class="fa-solid fa-print"></i>
                                                Print
                                            </a>
                            </div>

                ';
            }

            $date_happend = new DateTime($data->date_occur);
            $statusName = $data->status == 0 ? 'Unresolve' : 'Completed';
            $statusClass = $data->status == 0 ? 'alert-warning' : 'alert-success';
            $statusColor = $data->status == 0 ? 'text-bg-danger' : 'text-bg-success';
            $t_name = $data->t_name ?? "Not assigned";
            $date_fixed = $data->date_fixed ? \Carbon\Carbon::parse($data->date_fixed)->format('M j Y h:i:s A') : 'Tentative';

            $sim_contents .= '
            <div class="col-md-12 mb-4 shadow-sm border">
                    <section class="p-2">
                        <div class="text-center m-0 mb-1 border border-1 p-2">
                            <span class ="fw-bold badge ' . $statusColor . '">Status: ' . $statusName . '</span>
                            <span class ="fw-bold badge text-bg-info">Sim-type: ' . $data->sim_type . '</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div class="border  shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Time of Incident:
                                                <span
                                                    class="fw-bold badge text-bg-warning">' . $date_happend->format("M j, Y h:i:s A") . '</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Reported By:
                                                <span class="fw-bold badge text-bg-warning"> ' . $data->c_name . ' </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-warning me-3">Discrepancy</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    ' . $data->issue_text . '
                                </div>
                            </div>
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div
                                    class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Date Fixed:
                                                <span
                                                    class="fw-bold badge text-bg-primary">' . $date_fixed . '</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Attending Technician:
                                                <span class="fw-bold badge text-bg-primary">
                                                    ' . $t_name . '
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-primary me-3">Corrective Actions</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    ' . $data->solution_text . '
                                </div>
                            </div>
                        </div>
                        ' . $restriction . '
                    </section>
                </div>

            ';
        }

        return $this->json_respone($sim_contents, true);
    }
    public function advanceFiltering(Request $request)
    {
        $from_date = $request->from_date ? Carbon::parse($request->from_date)->startOfDay()->toDateTimeString() : null;
        $to_date = $request->to_date ? Carbon::parse($request->to_date)->endOfDay()->toDateTimeString() : null;
        $simulator_type = $request->simulator_type;
        $sim_status = $request->sim_status;

        $datas = DB::table('simulators')
            ->when($simulator_type, function ($query, $simulator_type) {
                return $query->where('sim_type', $simulator_type);
            })
            ->when(!is_null($sim_status), function ($query) use ($sim_status) {
                return $query->where('status', $sim_status);
            })
            ->when($from_date, function ($query) use ($from_date) {
                return $query->where('date_occur', '>=', $from_date);
            })
            ->when($to_date, function ($query) use ($to_date) {
                return $query->where('date_occur', '<=', $to_date);
            })
            ->orderBy('date_occur', 'DESC')
            ->get();

        $sim_contents = '';
        $restriction = '';

        foreach ($datas as $data) {
            $redirects = route('sim.show', ['report_id' => Crypt::encrypt($data->id)]);
            $generateReport = route('sim.generate-pdf', ['report_id' => $data->id]);

            if (Gate::allows('technician')) {
                $restriction = '
                <div class=" mb-1 mt-2">
                                <a href="' . $redirects . '"
                                    class="btn btn-outline-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                                <a href="' . $generateReport . '" target="_blank" class="btn btn-outline-info">
                                                <i class="fa-solid fa-print"></i>
                                                Print
                                            </a>
                            </div>

                ';
            }

            $date_happend = new DateTime($data->date_occur);
            $statusName = $data->status == 0 ? 'Unresolve' : 'Completed';
            $statusClass = $data->status == 0 ? 'alert-warning' : 'alert-success';
            $statusColor = $data->status == 0 ? 'text-bg-danger' : 'text-bg-success';
            $t_name = $data->t_name ?? "Not assigned";
            $date_fixed = $data->date_fixed ? \Carbon\Carbon::parse($data->date_fixed)->format('M j Y h:i:s A') : 'Tentative';

            $sim_contents .= '
            <div class="col-md-12 mb-4 shadow-sm border">
                    <section class="p-2">
                        <div class="text-center m-0 mb-1 border border-1 p-2">
                            <span class ="fw-bold badge ' . $statusColor . '">Status: ' . $statusName . '</span>
                            <span class ="fw-bold badge text-bg-info">Sim-type: ' . $data->sim_type . '</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div class="border  shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Time of Incident:
                                                <span
                                                    class="fw-bold badge text-bg-warning">' . $date_happend->format("M j, Y h:i:s A") . '</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Reported By:
                                                <span class="fw-bold badge text-bg-warning"> ' . $data->c_name . ' </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-warning me-3">Discrepancy</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    ' . $data->issue_text . '
                                </div>
                            </div>
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div
                                    class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Date Fixed:
                                                <span
                                                    class="fw-bold badge text-bg-primary">' . $date_fixed . '</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Attending Technician:
                                                <span class="fw-bold badge text-bg-primary">
                                                    ' . $t_name . '
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-primary me-3">Corrective Actions</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    ' . $data->solution_text . '
                                </div>
                            </div>
                        </div>
                        ' . $restriction . '
                    </section>
                </div>

            ';
        }

        return $this->json_respone($sim_contents, true);
    }


    function json_respone($message, $status)
    {
        return response()->json([
            'success' => $status ?? false,
            'message' => $message ?? 'no data pass'
        ]);
    }

    public function generatePdfFromTemplate(string $templatePath, array $data): string
    {
        $pdf = new Fpdi();

        $pdf->AddPage();
        $pdf->setSourceFile($templatePath);
        $tplId = $pdf->importPage(1);
        $pdf->useTemplate($tplId);

        $pdf->SetFont('Helvetica', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // Write basic text at fixed positions
        $pdf->SetXY(10, 70);
        // Build all content as a single HTML string
        $html = '
    <span><strong>Date Occur:</strong> ' . ($data['date_ocur'] ?? '') . '</span><br>
<span><strong>Reported by:</strong> ' . ($data['name'] ?? '') . '</span><br>
<span><strong>Sim Type:</strong> ' . ($data['sim_type'] ?? '') . '</span><br>
<span><strong>Status:</strong> ' . ($data['status'] ?? '') . '</span><br><br>
<span style="text-align:center; color: red; font-weight: bolder;"><strong>Discrepancy</strong></span>
    ';

        if (!empty($data['html'])) {
            $html .= $data['html'];
        }

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->SetTitle('Generate Report | PDF');

        return $pdf->Output('Simulator Error');
    }

    public function generatePDFReport($report_id)
    {
        $templatePath = public_path('assets/pdfs/sample.pdf');

        $sim = Simulator::find($report_id);

        if (!$sim) {
            return redirect()->route('sim.index');
        }

        $status = [
            0 => 'Unresolve',
            1 => 'Resolve',
        ];

        $sim_status = $status[$sim->status];

        $date_fixed = $sim->date_fixed ? \Carbon\Carbon::parse($sim->date_occur)->format('M j Y h:i:s A') : 'Tentative';

        $dummyData = [
            'name'   =>  $sim->c_name,
            'date_ocur'   => $sim->date_occur ? \Carbon\Carbon::parse($sim->date_occur)->format('M j Y h:i:s A') : 'Tentative',
            'sim_type' =>  $sim->sim_type,
            'status' => $sim_status,

            'html' => '
' . $sim->issue_text . '

<hr>
<h2></h2>
<span><strong>Date Fixed:</strong> ' .  $date_fixed . '</span><br>
<span><strong>Attending Technician:</strong> ' . ($sim->t_name ?? 'not assign') . '</span><br>
<span><strong>Status:</strong> ' . ($sim_status ?? '') . '</span><br><br>
<span style="text-align:center; color: blue; font-weight: bolder;"><strong>Corrective Actions</strong></span>
' . $sim->solution_text . ''
        ];

        $pdf = $this->generatePdfFromTemplate($templatePath, $dummyData);

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="sim_error.pdf"');
    }
}
