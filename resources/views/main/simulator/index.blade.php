@php
    $content_title = 'Common Simulator Errors & Possible Solutions';
@endphp
@extends('layouts.main')

@section('main-content')
    <div class="d-flex align-items-center gap-2 mb-3">
        <div class="col-md-4">
            <div class="input-group">
                <button class="btn btn-outline-secondary" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="search" name="search" id="search" class="form-control" placeholder="Search Anything">
            </div>
        </div>

        <div class="col-md-2">
            <select name="sort_by_sim" id="sort_by_sim" class="form-select">
                <option value="" selected disabled>--sort by sim--</option>
                <option value="PFC">PFC</option>
                <option value="Red Bird">Red Bird</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort_by_sim" id="sort_by_sim" class="form-select">
                <option value="" selected disabled>--sort by status--</option>
                <option value="0">Unresolve</option>
                <option value="1">Completed</option>
            </select>
        </div>

        <span class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#filter_modal"><i
                class="fa-solid fa-filter"></i> Filter</span>

        {{-- <a href="#" class="btn btn-info">
            <i class="fa-solid fa-print"></i>
            Print
        </a> --}}
    </div>

    </div>
    <div id="default_container">

        @if (!isset($datas) || $datas->isEmpty())
            <div class="card text-center shadow-sm border-0 my-4">
                <div class="card-body">
                    <h5 class="card-title text-muted">
                        <i class="fa-solid fa-circle-check text-success me-2"></i>
                        No incident data available
                    </h5>
                    <p class="card-text text-secondary">
                        RED BIRD and PFC systems are currently operating within normal parameters.
                    </p>
                </div>
            </div>
        @else
            @foreach ($datas as $data)
                @php
                    $date_happend = new DateTime($data->date_occur);
                    $statusName = $data->status == 0 ? 'Unresolve' : 'Completed';
                    $statusClass = $data->status == 0 ? 'alert-warning' : 'alert-success';
                    $statusColor = $data->status == 0 ? 'text-bg-danger' : 'text-bg-success';
                @endphp
                <div class="col-md-12 mb-4 shadow-sm border">
                    <section class="p-2">
                        <div class="text-center m-0 mb-1 border border-1 p-2">
                            <span class
                            ="fw-bold badge {{ $statusColor }}">status</span> <br>
                            <h5 class="m-0">{{ $statusName }}</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div
                                    class="border  shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Time of Incident:
                                                <span
                                                    class="fw-bold badge text-bg-warning">{{ $date_happend->format('M j, Y h:i:s A') }}</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Reported By:
                                                <span class="fw-bold badge text-bg-warning"> {{ $data->c_name }} </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-warning me-3">Discrepancy</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    {!! $data->issue_text !!}
                                </div>
                            </div>
                            {{-- correcttive --}}
                            <div class="col-md-6 border  shadow-sm p-3">
                                <div
                                    class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">Date Fixed:
                                                <span
                                                    class="fw-bold badge text-bg-primary">{{ $data->date_fixed ? \Carbon\Carbon::parse($data->date_fixed)->format('M j Y h:i:s A') : 'Tentative' }}</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-secondary">
                                                Attending Technician:
                                                <span class="fw-bold badge text-bg-primary"> {{ $data->t_name ?? 'Not assigned' }}
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="badge text-bg-primary me-3">Corrective Actions</span>
                                </div>
                                <div class="maintenance_content text-muted">
                                    {!! $data->solution_text !!}
                                </div>
                            </div>
                        </div>
                        @can('technician')
                            <div class=" mb-1 mt-2">
                                <a href="{{ route('sim.show', ['report_id' => Crypt::encrypt($data->id)]) }}" class="btn btn-outline-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                            </div>
                        @endcan
                    </section>
                </div>
            @endforeach
        @endif

    </div>

    <div id="sim_container"></div>
@endsection
