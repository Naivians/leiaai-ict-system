<div class="modal fade" id="filter_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Advance Filtering</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="advanceFiltering">
                    <div class="mb-3">
                        <label for="simulator_type" class="form-label text-secondary">Simulator Type</label>
                        <select name="simulator_type" id="simulator_type" class="form-select">
                            <option value="" selected disabled>--sort by sim--</option>
                            <option value="PFC">PFC</option>
                            <option value="RED BIRD">Red Bird</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sim_status" class="form-label text-secondary">Simulator Status</label>
                        <select name="sim_status" id="sim_status" class="form-select">
                            <option value="" selected disabled>--sort by status--</option>
                            <option value="0">Unresolve</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="from_date" class="form-label text-secondary">From</label>
                            <input type="date" name="from_date" id="from_date" class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="to_date" class="form-label text-secondary">To</label>
                            <input type="date" name="to_date" id="to_date" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-filter me-2"></i>Filter</button>
            </div>
            </form>
        </div>
    </div>
</div>
