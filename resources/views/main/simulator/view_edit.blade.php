@php

    $content_title = 'Update Simulator Error Report Form';

    if (!isset($sim_data)) {
        return redirect()->route('sim.index');
    }

@endphp
@extends('layouts.main')

@section('main-content')
    <h4 class="badge text-bg-danger text-center">Simulator Error</h4>
    <p class="m-0 mb-1">
        <small class="text-muted">Reported by: </small>
        <span class="badge text-bg-warning">{{ $sim_data->c_name }}</span>
    </p>
    <p class="m-0 mb-3">
        <small class="text-muted">Date Occured: </small>
        <span
            class="badge text-bg-warning">{{ \Carbon\Carbon::parse($sim_data->date_occur)->format('M j Y, h:i:s A') }}</span>
    </p>
    <div class="alert alert-warning">
        {!! $sim_data->issue_text !!}
    </div>
    <div class="shadow-sm border rounded p-2">
        <form id="update_sim_form">
            <input type="hidden" name="report_id" id="report_id" value="{{ $sim_data->id }}">
            <div class="mb-3">
                <div id="toolbar" class="w-100">
                    <button class="ql-bold" data-bs-toggle="tooltip" title="bold"></button>
                    <button class="ql-italic" data-bs-toggle="tooltip" title="italic"></button>
                    <button class="ql-underline" data-bs-toggle="tooltip" title="underline"></button>
                    <button class="ql-list" value="bullet" data-bs-toggle="tooltip" title="list"></button>
                    <button class="ql-clean" data-bs-toggle="tooltip" title="clear format"></button>
                </div>
                <div id="editor" style="height: 400px; width: 100%;" class="mb-2">
                    {!! $sim_data->solution_text !!}
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <a href="{{ route('sim.index') }}" class="btn btn-outline-danger">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
