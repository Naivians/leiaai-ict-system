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
                        <div class="d-flex align-items-center justify-content-between fs-5">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <p class="card-text fs-4">{{ $simulator_error['today_error'] }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('sim.index') }}" class="text-decoration-none">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Overall Total Error</h5>
                        <div class="d-flex align-items-center justify-content-between fs-5">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <p class="card-text fs-4">{{ $simulator_error['total_error'] }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('sim.index') }}" class="text-decoration-none">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Problem Resolve</h5>
                         <div class="d-flex align-items-center justify-content-between fs-5">
                            <i class="fa-solid fa-thumbs-up fs-5"></i>
                            <p class="card-text fs-4">{{ $simulator_error['today_resolve'] }}</p>
                        </div>
                    </div>

                </div>
            </a>
        </div>
    </div>

    <div class="col-md-4 shadow-sm w-100" style="height: 300px;">
        <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
    </div>
@endsection

@section('custom_scripts')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line', // ⚠️ Use 'line' instead of 'bar'
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Monthly Error',
                    data: @json($data['values']),
                    borderColor: 'rgba(220, 53, 69, 1)',
                    backgroundColor: 'rgba(220, 53, 69, 0.1)',
                    pointStyle: 'circle', // ✨ shape of the point
                    pointRadius: 8, // ✨ size of the point
                    pointBackgroundColor: 'red',
                    pointBorderColor: 'black',
                    tension: 0.3 // smooth curve (optional)
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
