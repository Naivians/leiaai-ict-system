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
                <div class="col-md-3">
                    <label for="c_name" class="form-label text-muted">Flight Instructor</label> <br>
                    <select id="c_name" name="c_name" class="w-100 form-select">
                        <option value="" disabled selected>--select your name--</option>
                        <optgroup label="Flight Instructor">
                            <option value="David Winkle">David Winkle</option>
                            <option value="Elcid Tolentino">Elcid Tolentino</option>
                            <option value="Elijah Amos E. Peregrina">Elijah Amos E. Peregrina</option>
                            <option value="Geebee Hernandez">Geebee Hernandez</option>
                            <option value="Greggy Paduganan">Greggy Paduganan</option>
                            <option value="Isay Mendoza">Isay Mendoza</option>
                            <option value="Jaeson Muceros">Jaeson Muceros</option>
                            <option value="Jan Michael Orozco">Jan Michael Orozco</option>
                            <option value="Jeymour Buhayo">Jeymour Buhayo</option>
                            <option value="John Cyril Occeña">John Cyril Occeña</option>
                            <option value="Jose Carlos Asuncion">Jose Carlos Asuncion</option>
                            <option value="Jp De Vera">Jp De Vera</option>
                            <option value="Kristian Asuncion">Kristian Asuncion</option>
                            <option value="Lukas Angelo Imperial Oliveros">Lukas Angelo Imperial Oliveros</option>
                            <option value="Macbeth Yamagata">Macbeth Yamagata</option>
                            <option value="Marc Jomari Manuel Taliman">Marc Jomari Manuel Taliman</option>
                            <option value="Marwin Caoile">Marwin Caoile</option>
                            <option value="Miko Doria">Miko Doria</option>
                            <option value="Philmer Powao">Philmer Powao</option>
                            <option value="RJ Tejada">RJ Tejada</option>
                            <option value="Robert Durano">Robert Durano</option>
                            <option value="Ron Nario">Ron Nario</option>
                            <option value="Vey Hubert Sastrodemedjo">Vey Hubert Sastrodemedjo</option>
                            <option value="Ynez Bagui">Ynez Bagui</option>
                            <option value="Mico Espiritu">Mico Espiritu</option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="sim_type" class="form-label text-muted">Simulator</label> <br>
                    <select id="sim_type" name="sim_type" class="w-100 form-select">
                        <option value="" disabled selected>--simulator type--</option>
                        <optgroup label="Simulator">
                            <option value="RED BIRD">Red Bird</option>
                            <option value="PFC">PFC</option>
                        </optgroup>
                    </select>
                </div>

                @can('developer')
                    <div class="col-md-3">
                        <label for="date_occur" class="form-label text-muted">Date Occur</label>
                        <input type="date" name="date_occur" id="date_occur" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label for="date_fixed" class="form-label text-muted">Date Fixed</label>
                        <input type="date" name="date_fixed" id="date_fixed" class="form-control">
                    </div>
                @endcan

                <div class="col-md-12 mt-4">
                    <a href="{{ route('sim.index') }}" class="btn btn-outline-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </div>
@endsection
