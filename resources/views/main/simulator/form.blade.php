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
                    <label for="c_name" class="form-label text-muted">Flight Instructor</label> <br>
                    <select id="c_name" name="c_name" class="w-100 form-select">
                        <option value="" disabled selected>--select your name--</option>
                        <optgroup label="Flight Instructor">
                            <option value="JK">John Keller</option>
                            <option value="MS">Maya Spencer</option>
                            <option value="TR">Tyler Reeves</option>
                            <option value="LC">Lena Carter</option>
                            <option value="DP">Derek Prince</option>
                            <option value="AV">Ava Vincent</option>
                            <option value="BS">Brandon Steele</option>
                            <option value="KH">Kylie Harper</option>
                            <option value="NR">Noah Rhodes</option>
                            <option value="EM">Ella Monroe</option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="sim_type" class="form-label text-muted">Simulator</label> <br>
                    <select id="sim_type" name="sim_type" class="w-100 form-select">
                        <option value="" disabled selected>--select your name--</option>
                        <optgroup label="Simulator">
                            <option value="RED BIRD">Red Bird</option>
                            <option value="PFC">PFC</option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-md-2 mt-4">
                    <a href="#" class="btn btn-outline-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
