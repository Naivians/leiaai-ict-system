<div class="nav-bar-container shadow-sm rounded p-3 d-flex align-items-center justify-content-between fixed-top z-3">
    <div class="d-flex align-items-center gap-4">
        <i class="fa-solid fa-circle-chevron-right back-btn " data-bs-toggle="tooltip" id="closeBtn"
            data-bs-title="Toggle Sidebar"></i>
        {{-- <i class="fa-solid fa-bars back-btn" data-bs-toggle="tooltip" id="closeBtn" data-bs-title="Toggle Sidebar"></i> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex align-items-center">
        <span>Howdy, <span class="fw-bold mx-1">Marvin</span></span>

        <div class="dropdown">
            <img src="https://placehold.co/600x400" alt="" class="rounded-circle"
                style="width: 30px; height: 30px; object-fit: cover; cursor:pointer;" data-bs-toggle="dropdown"
                aria-expanded="false">
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div>
