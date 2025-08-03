<div class="menu shadow-sm rounded">
    <div class="logo-container">
        <img src="https://placehold.co/600x400" style="width: 60px; height: 60px; object-fit: cover; cursor:pointer;"
            class="rounded-circle">
        Company Name
    </div>

    <div class="menu-item border-1" data-bs-toggle="tooltip" data-bs-title="Dashboard">
        <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3">
            <div class="menu-icon me-2">
                <i class="fa-solid fa-house"></i>
            </div>
            <div class="menu-text">Dashboard</div>
        </a>
    </div>
    @can('tickets')
        <div class="menu-item border-1" data-bs-toggle="tooltip" data-bs-title="Category">
            <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3">
                <div class="menu-icon me-2">
                    <i class="fa-solid fa-list"></i>
                </div>
                <div class="menu-text">Category</div>
            </a>
        </div>
        <div class="menu-item has-dropdown border-1" data-bs-toggle="tooltip" data-bs-title="Tickets Form">
            <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3"
                data-bs-toggle="collapse" data-bs-target="#forms" aria-expanded="false">
                <div class="menu-icon me-2">
                    <i class="fa-solid fa-ticket"></i>
                </div>
                <div class="menu-text">Tickets</div>
                <i class="fas fa-caret-down ms-auto transition forms-caret"></i>
            </a>
        </div>


        <div class="collapse ms-2" id="forms" style="min-width: 150px;">
            <a href="#" class="text-decoration-none text-dark d-block px-3 py-2 submenu ms-3">
                <i class="fa-solid fa-ticket"></i>
                Open Ticket
            </a>
            <a href="#" class="text-decoration-none text-dark d-block px-3 py-2 submenu ms-3">
                <i class="fa-solid fa-ticket"></i>
                Manage Ticket
            </a>
        </div>
    @endcan



    @can('simulator')
        <div class="menu-item has-dropdown border-1" data-bs-toggle="tooltip" data-bs-title="Tickets Form">
            <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3"
                data-bs-toggle="collapse" data-bs-target="#sim" aria-expanded="false">
                <div class="menu-icon me-2">
                    <i class="fa-solid fa-plane"></i>
                </div>
                <div class="menu-text">Simulator</div>
                <i class="fas fa-caret-down ms-auto transition forms-caret"></i>
            </a>
        </div>

        <div class="collapse ms-2" id="sim" style="min-width: 150px;">

            <a href="{{ route('sim.index') }}" class="text-decoration-none text-dark d-block px-3 py-2 submenu ms-3">
                <i class="fa-solid fa-plane"></i>
                Manage Sim
            </a>

            <a href="{{ route('sim.form') }}" class="text-decoration-none text-dark d-block px-3 py-2 submenu ms-3">
                <i class="fa-solid fa-plane"></i>
                Log Maintenance
            </a>
        </div>
    @endcan

    @can('tickets')
        <div class="menu-item border-1" data-bs-toggle="tooltip" data-bs-title="Audit">
            <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3">
                <div class="menu-icon me-2">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="menu-text">Audit</div>
            </a>
        </div>

        <div class="menu-item border-1" data-bs-toggle="tooltip" data-bs-title="Settings">
            <a href="#" class="text-decoration-none text-dark d-flex align-items-center w-100 pe-3">
                <div class="menu-icon me-2">
                    <i class="fa-solid fa-gears"></i>
                </div>
                <div class="menu-text">Settings</div>
            </a>
        </div>
    @endcan
</div>
