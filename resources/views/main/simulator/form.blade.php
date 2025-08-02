@php
    $content_title = 'Simulator Error Report Form';
@endphp
@extends('layouts.main')

@section('main-content')
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

            <div class="row">
                <div class="col-md-6">
                    <label for="fi_name" class="form-label text-muted">Flight Instructor</label>
                    <input type="search" list="fis" id="fi_name" name="fi_name" class="form-control"
                        placeholder="Search you name here" />
                    <datalist id="fis">
                        <option value="John Doe">
                        <option value="Jane Smith">
                        <option value="Alice Johnson">
                        <option value="Bob Williams">
                        <option value="Charlie Brown">
                        <option value="Diana Miller">
                        <option value="Ethan Davis">
                        <option value="Fiona Garcia">
                        <option value="George Clark">
                        <option value="Hannah Lewis">
                    </datalist>
                </div>

                <div class="col-md-6">
                    <label for="sim" class="form-label text-muted">Simulator</label>
                    <select name="sim" id="sim" class="form-select">
                        <option value="" disabled selected>---Select Sim---</option>
                        <option value="PFC">PFC</option>
                        <option value="RB">Red Bird</option>
                    </select>
                </div>

                <div class="col-md-2 mt-5">
                    <a href="#" class="btn btn-outline-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('custom_scripts')
    <script></script>
@endsection
