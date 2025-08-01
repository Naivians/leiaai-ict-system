<div class="menu shadow-sm rounded">
    <div class="logo-container">
        <img src="https://placehold.co/600x400" style="width: 60px; height: 60px; object-fit: cover; cursor:pointer;"
            class="rounded-circle">
        Company Name
    </div>
    <div class="menu-item border-1">
        <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3">
            <div class="menu-icon me-2">
                <i class="fas fa-home" data-bs-toggle="tooltip" data-bs-title="Dashboard"></i>
            </div>
            <div class="menu-text">Dashboard</div>
        </a>
    </div>

    <div class="menu-item border-1">
        <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3">
            <div class="menu-icon me-2">
                <i class="fas fa-chart-line" data-bs-toggle="tooltip" data-bs-title="Monitor"></i>
            </div>
            <div class="menu-text">Monitoring</div>
        </a>
    </div>

    <div class="menu-item has-dropdown border-1">
        <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3"
            data-bs-toggle="collapse" data-bs-target="#forms" aria-expanded="false">
            <div class="menu-icon me-2">
                <i class="fas fa-file-alt" data-bs-toggle="tooltip" data-bs-title="Forms"></i>
            </div>
            <div class="menu-text">Forms</div>
            <i class="fas fa-caret-down ms-auto transition" id="forms-caret"></i>
        </a>
    </div>
    <div class="collapse ms-2" id="forms" style="min-width: 150px;">
        <a href="#" class="text-decoration-none text-dark d-block px-3 py-2 submenu">
            <i class="fas fa-file-alt"></i>
            Grounds Form
        </a>
        <a href="#" class="text-decoration-none text-dark d-block px-3 py-2 submenu">
            <i class="fas fa-file-alt"></i>
            Simulator Simulator
        </a>
    </div>
</div>
