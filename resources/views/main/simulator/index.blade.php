@php
    $content_title = 'Common Simulator Errors & Possible Solutions';
@endphp
@extends('layouts.main')

@section('main-content')
    <div class="d-flex align-items-center gap-2 mb-3">
        <div class="col-md-2">
            <div class="input-group">
                <button class="btn btn-outline-secondary" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="search" name="search" id="search" class="form-control" placeholder="search complain">
            </div>
        </div>




        <div class="col-md-1">
            <select name="sort_by_sim" id="sort_by_sim" class="form-select">
                <option value="" selected disabled>--sort by sim--</option>
                <option value="PFC">PFC</option>
                <option value="Red Bird">Red Bird</option>
            </select>
        </div>

        <span class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#filter_modal" ><i
                class="fa-solid fa-filter"></i> Filter</span>

        <a href="#" class="btn btn-info">
            <i class="fa-solid fa-print"></i>
            Print
        </a>
        {{-- <div class="col-md-2">
            <select name="sort_by_sim" id="sort_by_sim" class="form-select">
                <option value="" selected disabled>--sort by status--</option>
                <option value="PFC">PFC</option>
                <option value="Red Bird">Red Bird</option>
            </select>
        </div> --}}
    </div>

    </div>
    <div class="col-md-12 mb-4 shadow-sm border">
        <section class="p-2">
            <div class="d-flex align-items-center gap-2">
                <div class="col-md-6 border rounded shadow-sm p-3">
                    <div class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="col-md-12">
                                <span class="text-secondary">Date Happened:
                                    <span class="fw-bold badge text-bg-warning">August 3, 2025 09:09:00 PM</span>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <span class="text-secondary">
                                    Complainant Name:
                                    <span class="fw-bold badge text-bg-warning">John Doe</span>
                                </span>
                            </div>
                        </div>
                        <span class="badge text-bg-warning me-3">Complaint</span>
                    </div>
                    <div class="maintenance_content">
                        <span class="text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur maiores nostrum accusamus
                            itaque laborum ad molestiae omnis vel fugiat dolor deserunt beatae soluta enim delectus iure
                            maxime, officia quaerat sapiente voluptate libero voluptatum eius ex veritatis possimus.
                            Suscipit accusantium officiis sunt minima nesciunt ipsam quam, dolore nemo laudantium nam ut
                            architecto quibusdam iure aliquid repudiandae veniam est. Sequi rem amet officiis voluptatibus,
                            inventore corporis dicta ad ut quos suscipit aut sapiente, earum quidem atque facere veritatis
                            recusandae minima sunt? Dolor officiis accusantium odit minus provident ea, fugit ipsum
                            necessitatibus cupiditate? Iure id nisi in reiciendis ad illo assumenda voluptatum nobis cum
                            beatae, ab unde dignissimos maiores sed labore nemo nesciunt fugit soluta eveniet eius omnis
                            magnam provident perspiciatis explicabo! Harum, unde? Consequuntur eveniet ipsa reprehenderit
                            tempora quis expedita
                        </span>
                    </div>
                </div>
                <div class="col-md-6 border rounded shadow-sm p-3">
                    <div class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="col-md-12">
                                <span class="text-secondary"> Date Fixed:
                                    <span class="fw-bold badge text-bg-primary">August 3, 2025 09:09:00 PM</span>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <span class="text-secondary">
                                    Technician:
                                    <span class="fw-bold badge text-bg-primary">John Doe</span>
                                </span>
                            </div>
                        </div>
                        <span class="badge text-bg-primary me-3">Corrective Action</span>
                    </div>
                    <div class="maintenance_content">
                        <span class="text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur maiores nostrum accusamus
                            itaque laborum ad molestiae omnis vel fugiat dolor deserunt beatae soluta enim delectus iure
                            maxime, officia quaerat sapiente voluptate libero voluptatum eius ex veritatis possimus.
                            Suscipit accusantium officiis sunt minima nesciunt ipsam quam, dolore nemo laudantium nam ut
                            architecto quibusdam iure aliquid repudiandae veniam est. Sequi rem amet officiis voluptatibus,
                            inventore corporis dicta ad ut quos suscipit aut sapiente, earum quidem atque facere veritatis
                            recusandae minima sunt? Dolor officiis accusantium odit minus provident ea, fugit ipsum
                            necessitatibus cupiditate? Iure id nisi in reiciendis ad illo assumenda voluptatum nobis cum
                            beatae, ab unde dignissimos maiores sed labore nemo nesciunt fugit soluta eveniet eius omnis
                            magnam provident
                        </span>
                    </div>

                </div>
            </div>
            <div class=" mb-1 mt-2">
                <a href="#" class="btn btn-outline-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit
                </a>
                <a href="#" class="btn btn-outline-danger">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </a>
                <a href="#" class="btn btn-outline-info">
                    <i class="fa-solid fa-print"></i>
                    Print
                </a>
            </div>
        </section>
    </div>
    <div class="col-md-12 mb-4 shadow-sm border">
        <section class="p-2">
            <div class="d-flex align-items-center gap-2">
                <div class="col-md-6 border rounded shadow-sm p-3">
                    <div class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="col-md-12">
                                <span class="text-secondary">Date Happened:
                                    <span class="fw-bold badge text-bg-warning">August 3, 2025 09:09:00 PM</span>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <span class="text-secondary">
                                    Complainant Name:
                                    <span class="fw-bold badge text-bg-warning">John Doe</span>
                                </span>
                            </div>
                        </div>
                        <span class="badge text-bg-warning me-3">Complaint</span>
                    </div>
                    <div class="maintenance_content">
                        <span class="text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur maiores nostrum accusamus
                            itaque laborum ad molestiae omnis vel fugiat dolor deserunt beatae soluta enim delectus iure
                            maxime, officia quaerat sapiente voluptate libero voluptatum eius ex veritatis possimus.
                            Suscipit accusantium officiis sunt minima nesciunt ipsam quam, dolore nemo laudantium nam ut
                            architecto quibusdam iure aliquid repudiandae veniam est. Sequi rem amet officiis voluptatibus,
                            inventore corporis dicta ad ut quos suscipit aut sapiente, earum quidem atque facere veritatis
                            recusandae minima sunt? Dolor officiis accusantium odit minus provident ea, fugit ipsum
                            necessitatibus cupiditate? Iure id nisi in reiciendis ad illo assumenda voluptatum nobis cum
                            beatae, ab unde dignissimos maiores sed labore nemo nesciunt fugit soluta eveniet eius omnis
                            magnam provident perspiciatis explicabo! Harum, unde? Consequuntur eveniet ipsa reprehenderit
                            tempora quis expedita
                        </span>
                    </div>
                </div>
                <div class="col-md-6 border rounded shadow-sm p-3">
                    <div class="border rounded shadow-sm p-2 mb-3 d-flex align-items-center justify-content-between">
                        <div>
                            <div class="col-md-12">
                                <span class="text-secondary"> Date Fixed:
                                    <span class="fw-bold badge text-bg-primary">August 3, 2025 09:09:00 PM</span>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <span class="text-secondary">
                                    Technician:
                                    <span class="fw-bold badge text-bg-primary">John Doe</span>
                                </span>
                            </div>
                        </div>
                        <span class="badge text-bg-primary me-3">Corrective Action</span>
                    </div>
                    <div class="maintenance_content">
                        <span class="text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur maiores nostrum accusamus
                            itaque laborum ad molestiae omnis vel fugiat dolor deserunt beatae soluta enim delectus iure
                            maxime, officia quaerat sapiente voluptate libero voluptatum eius ex veritatis possimus.
                            Suscipit accusantium officiis sunt minima nesciunt ipsam quam, dolore nemo laudantium nam ut
                            architecto quibusdam iure aliquid repudiandae veniam est. Sequi rem amet officiis voluptatibus,
                            inventore corporis dicta ad ut quos suscipit aut sapiente, earum quidem atque facere veritatis
                            recusandae minima sunt? Dolor officiis accusantium odit minus provident ea, fugit ipsum
                            necessitatibus cupiditate? Iure id nisi in reiciendis ad illo assumenda voluptatum nobis cum
                            beatae, ab unde dignissimos maiores sed labore nemo nesciunt fugit soluta eveniet eius omnis
                            magnam provident
                        </span>
                    </div>

                </div>
            </div>
            <div class=" mb-1 mt-2">
                <a href="#" class="btn btn-outline-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit
                </a>
                <a href="#" class="btn btn-outline-danger">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </a>
                <a href="#" class="btn btn-outline-info">
                    <i class="fa-solid fa-print"></i>
                    Print
                </a>
            </div>
        </section>
    </div>
@endsection
