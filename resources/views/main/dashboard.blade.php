@php
    $content_title = 'Dashboard Overview';
@endphp
@extends('layouts.main')

@section('main-content')
    <div class="row mb-4">
        <div class="col-md-3">
            <a href="{{ route('sim.index') }}" class="text-decoration-none">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Errors Logged Today</h5>
                        <p class="card-text fs-4">{{ $simulator_error['today_error'] }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('sim.index') }}" class="text-decoration-none">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Overall Total Error</h5>
                        <p class="card-text fs-4">{{ $simulator_error['today_error'] }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
