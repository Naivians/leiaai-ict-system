@extends('layouts.main')

@section('main-content')
    <div class="container" id="indeContainer">

        <h1 class="text-center mb-3 mt-5">LEIAAI Attendance Monitoring for FI's</h1>

        <ul class="nav nav-tabs" id="simTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-rd" data-bs-toggle="tab" data-bs-target="#grouds" type="button"
                    role="tab">
                    Gounds
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-pfc" data-bs-toggle="tab" data-bs-target="#simulator" type="button"
                    role="tab">
                    Simulator
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-pfc" data-bs-toggle="tab" data-bs-target="#attendace" type="button"
                    role="tab">
                    Attendance
                </button>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="grouds" role="tabpanel">
                <h4>Red Bird Simulator</h4>
                <p>This is the Red Bird content section.</p>
            </div>
            <div class="tab-pane fade" id="simulator" role="tabpanel">
                <div class="qr_container mb-5">
                    <div class="mt-4">
                        <h2 class="text-muted text-center mb-4">You are assign to?</h2>
                        <div class="d-flex align-items-center justify-content-center gap-3 ">
                            <div class="box border shadow-sm rounded p-4" role="button" onclick="getSim('Red Bird')">
                                <div class="img-container">
                                    <img src="{{ asset('assets/img/rb.webp') }}" alt="">
                                </div>
                                <h2 class="text-center">Red Bird</h2>
                            </div>

                            <div class="box border shadow-sm rounded p-4" role="button" onclick="getSim('PFC')">
                                <div class="img-container">
                                    <img src="{{ asset('assets/img/pfc.webp') }}" alt="">
                                </div>
                                <h2 class="text-center">PFC</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="attendace" role="tabpanel">
                <h4 class="mb-3">Today's Attendance</h4>
                <table id="attendanceTable" class="w-100">
                    <thead>
                        <tr>
                            <th class="bg-dark text-light">Name</th>
                            <th class="bg-dark text-light">Position</th>
                            <th class="bg-dark text-light">Time In</th>
                            <th class="bg-dark text-light">Time Out</th>
                            <th class="bg-dark text-light">Designation</th>
                            <th class="bg-dark text-light">Total hour(s)</th>
                            <th class="bg-dark text-light">Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>


        <div class="shadow-sm border-1 rounded bg-white p-3 mt-5">
            <input type="text" name="qr_code" id="qr_code" autocomplete="off" class="form-control border text-center"
                placeholder="Scan QR code..." style="height: 50px;">
            <div class="input-group mt-3 text-center">
                <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" value="in">
                <label class="btn btn-outline-primary" for="option1">In</label>
                <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" value="out">
                <label class="btn btn-outline-primary" for="option2">Out</label>
            </div>
        </div>
        {{--
        <div class="mt-5 mb-3 bg-white rounded p-3">
            <label for="designation" class="form-label text-secondary">Designation</label>
            <select name="designation" id="designation" class="form-select">
                <option value="" selected disabled>-- Select Designation -- </option>
                <option value="1">Grounds</option>
                <option value="2">Simulator</option>
            </select>
        </div> --}}
    </div>
@endsection
