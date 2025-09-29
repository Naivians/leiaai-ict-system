@php
    $content_title = 'Simulator Error Report Form';
@endphp
@extends('layouts.main')

@section('main-content')
    <div class="alert alert-info">
        <span class="fw-bold">Reminder:</span>
        Instructors are encouraged to report any discrepancies, provide suggestions, or offer recommendations concerning the
        simulator. Your professional feedback is essential to maintaining and enhancing simulation quality.
    </div>
    <div class="shadow-sm border rounded p-2">
        <form id="sim_form">
            <div class="mb-3">
                <div id="toolbar" class="w-100">
                    <button class="ql-bold" data-bs-toggle="tooltip" title="bold"></button>
                    <button class="ql-italic" data-bs-toggle="tooltip" title="italic"></button>
                    <button class="ql-underline" data-bs-toggle="tooltip" title="underline"></button>
                    <button class="ql-list" value="bullet" data-bs-toggle="tooltip" title="list"></button>
                    <button class="ql-clean" data-bs-toggle="tooltip" title="clear format"></button>
                </div>
                <div id="editor" style="height: 400px; width: 100%;" class="mb-2"></div>
            </div>

            @include('main.simulator.fi')
        </form>
    </div>
@endsection
