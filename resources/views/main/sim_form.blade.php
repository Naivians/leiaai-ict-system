@extends('layouts.main')

@section('main-content')
    <div class="container mt-5">
        <h1>Simulator Form</h1>
        <form id="simulatorForm" class="row g-3 align-items-end" autocomplete="off" novalidate>
            <div class="col-md-2 col-6">
                <label for="studentSelect" class="form-label fw-semibold">Student</label>
                <input class="form-control" list="studentsList" id="studentSelect" required
                    placeholder="Select or enter student name">
                <datalist id="studentsList">
                    <option value="Keana Villegas">
                    <option value="Lorvin Macaset">
                    <option value="John Doe">
                    <option value="Jane Smith">
                </datalist>
            </div>
            <div class="col-md-2 col-6">
                <label for="instructorSelect" class="form-label fw-semibold">Flight Instructor</label>
                <input class="form-control" list="instructorsList" id="instructorSelect" required
                    placeholder="Select or enter instructor name">
                <datalist id="instructorsList">
                    <option value="Cyril Occena">
                    <option value="Maria Blake">
                    <option value="James Bond">
                    <option value="Alex Cruz">
                </datalist>
            </div>
            <div class="col-md-2 col-6">
                <label for="simulatorSelect" class="form-label">Simulator</label>
                <select class="form-select" id="simulatorSelect" required>
                    <option value="" disabled selected>Select simulator</option>
                    <option value="RB">RB</option>
                    <option value="PFC">PFC</option>
                    <option value="SR22">SR22</option>
                </select>
            </div>
            <div class="col-md-2 col-6">
                <label for="timeFrom" class="form-label">From</label>
                <input type="time" class="form-control" id="timeFrom" required />
            </div>
            <div class="col-md-2 col-6">
                <label for="timeTo" class="form-label">To</label>
                <input type="time" class="form-control" id="timeTo" required />
            </div>
            <div class="col-md-2 col-12 d-grid">
                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <section class="mt-5">
            <h5><strong>Created Schedule</strong></h5>
            <p class="text-muted small mb-3">
                <strong>Note:</strong> The created schedule is <strong>editable</strong>. Use the Edit and Remove
                buttons.
            </p>
            <table id="scheduleTable" class="table align-middle table-striped">
                <thead>
                    <tr>
                        <th class="bg-dark text-light">Date</th>
                        <th class="bg-dark text-light">Student</th>
                        <th class="bg-dark text-light">Time</th>
                        <th class="bg-dark text-light">Total (hrs)</th>
                        <th class="bg-dark text-light">Flight Instructor</th>
                        <th class="bg-dark text-light">Simulator</th>
                        <th class="bg-dark text-light" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>06/07</td>
                        <td>Villegas, Keana</td>
                        <td>8-10</td>
                        <td>2</td>
                        <td>Cyril, Occena</td>
                        <td>RB</td>
                        <td class="actions">
                            <button class="btn-edit" type="button">Edit</button>
                            <button class="btn-remove" type="button">Remove</button>
                        </td>
                    </tr>
                    <tr>
                        <td>06/07</td>
                        <td>Macaset, Lorvin</td>
                        <td>10-12:30</td>
                        <td>2:30</td>
                        <td>Cyril, Occena</td>
                        <td>PFC</td>
                        <td class="actions">
                            <button class="btn-edit" type="button">Edit</button>
                            <button class="btn-remove" type="button">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Schedule Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="modalCloseBtn"></button>
                </div>
                <form id="editForm" novalidate autocomplete="off">
                    <div class="modal-body">
                        <input type="hidden" id="editIndex" />
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="editStudent" class="form-label fw-semibold">Student</label>
                                <input class="form-control" list="studentsList" id="editStudent" required
                                    placeholder="Select or enter student name">
                                <datalist id="studentsList">
                                    <option value="Keana Villegas">
                                    <option value="Lorvin Macaset">
                                    <option value="John Doe">
                                    <option value="Jane Smith">
                                </datalist>
                            </div>
                            <div class="col-md-6">
                                <label for="editInstructor" class="form-label fw-semibold">Flight Instructor</label>
                                <input class="form-control" list="instructorsList" id="editInstructor" required
                                    placeholder="Select or enter instructor name">
                                <datalist id="instructorsList">
                                    <option value="Cyril Occena">
                                    <option value="Maria Blake">
                                    <option value="James Bond">
                                    <option value="Alex Cruz">
                                </datalist>

                            </div>
                            <div class="col-md-6">
                                <label for="editSimulator" class="form-label fw-semibold">Simulator</label>
                                <select class="form-select" id="editSimulator" required>
                                    <option value="" disabled>Select simulator</option>
                                    <option value="RB">RB</option>
                                    <option value="PFC">PFC</option>
                                    <option value="SR22">SR22</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="editTimeFrom" class="form-label fw-semibold">From</label>
                                <input type="time" id="editTimeFrom" class="form-control" required />
                            </div>
                            <div class="col-md-3">
                                <label for="editTimeTo" class="form-label fw-semibold">To</label>
                                <input type="time" id="editTimeTo" class="form-control" required />
                            </div>
                            <div class="col-12 pt-2">
                                <label for="editDate" class="form-label fw-semibold">Date</label>
                                <input type="date" id="editDate" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            // Helpers for localStorage
            function saveScheduleToLocalStorage() {
                localStorage.setItem('simSchedule', JSON.stringify(schedule));
            }

            function loadScheduleFromLocalStorage() {
                const stored = localStorage.getItem('simSchedule');
                return stored ? JSON.parse(stored) : [];
            }

            // Load or initialize schedule
            let schedule = loadScheduleFromLocalStorage();

            // Utility functions
            function formatDate(dateString) {
                const d = new Date(dateString);
                if (isNaN(d)) return dateString;
                let mm = d.getMonth() + 1;
                let dd = d.getDate();
                return (mm < 10 ? '0' + mm : mm) + '/' + (dd < 10 ? '0' + dd : dd);
            }

            function calcTotalHours(fromStr, toStr) {
                const from = fromStr.split(':').map(Number);
                const to = toStr.split(':').map(Number);
                let fromMinutes = from[0] * 60 + from[1];
                let toMinutes = to[0] * 60 + to[1];
                if (toMinutes <= fromMinutes) return '0';
                let diff = toMinutes - fromMinutes;
                let h = Math.floor(diff / 60);
                let m = diff % 60;
                return m === 0 ? h.toString() : `${h}:${m < 10 ? '0' + m : m}`;
            }

            // DOM elements
            const form = document.getElementById('simulatorForm');
            const studentSelect = document.getElementById('studentSelect');
            const instructorSelect = document.getElementById('instructorSelect');
            const simulatorSelect = document.getElementById('simulatorSelect');
            const timeFromInput = document.getElementById('timeFrom');
            const timeToInput = document.getElementById('timeTo');
            const scheduleTableBody = document.querySelector('#scheduleTable tbody');

            // Modal
            const editModalEl = document.getElementById('editModal');
            const bsEditModal = new bootstrap.Modal(editModalEl);
            const editForm = document.getElementById('editForm');
            const editIndexInput = document.getElementById('editIndex');
            const editStudentSelect = document.getElementById('editStudent');
            const editInstructorSelect = document.getElementById('editInstructor');
            const editSimulatorSelect = document.getElementById('editSimulator');
            const editTimeFromInput = document.getElementById('editTimeFrom');
            const editTimeToInput = document.getElementById('editTimeTo');
            const editDateInput = document.getElementById('editDate');

            // Render table
            function renderSchedule() {
                scheduleTableBody.innerHTML = '';

                if (schedule.length === 0) {
                    scheduleTableBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center text-muted py-3">
                            No scheduled entries available.
                        </td>
                    </tr>`;
                    return;
                }

                schedule.forEach((item, index) => {
                    const tr = document.createElement('tr');

                    // Date
                    const tdDate = document.createElement('td');
                    tdDate.textContent = formatDate(item.date);
                    tr.appendChild(tdDate);

                    // Student
                    const tdStudent = document.createElement('td');
                    let [first, last] = item.student.split(' ');
                    if (!last) {
                        last = first;
                        first = '';
                    }
                    tdStudent.innerHTML = `${last},<br/>${first}`;
                    tr.appendChild(tdStudent);

                    // Time
                    const tdTime = document.createElement('td');
                    tdTime.textContent = `${item.from}-${item.to}`;
                    tr.appendChild(tdTime);

                    // Total
                    const tdTotal = document.createElement('td');
                    tdTotal.textContent = item.totalHours;
                    tr.appendChild(tdTotal);

                    // Instructor
                    const tdInstructor = document.createElement('td');
                    const parts = item.instructor.split(' ');
                    if (parts.length === 2) {
                        const firstName = parts[0];
                        const lastName = parts[1];
                        const link = document.createElement('a');
                        link.href = '#';
                        link.textContent = lastName;
                        link.style.color = '#0d6efd';
                        tdInstructor.innerHTML = `${firstName}, `;
                        tdInstructor.appendChild(link);
                    } else {
                        tdInstructor.textContent = item.instructor;
                    }
                    tr.appendChild(tdInstructor);

                    // Simulator
                    const tdSimulator = document.createElement('td');
                    tdSimulator.textContent = item.simulator;
                    tr.appendChild(tdSimulator);

                    // Actions
                    const tdActions = document.createElement('td');
                    tdActions.classList.add('actions');

                    const btnEdit = document.createElement('button');
                    btnEdit.type = 'button';
                    btnEdit.className = 'btn-edit';
                    btnEdit.innerHTML = 'Edit';
                    btnEdit.addEventListener('click', () => openEditModal(index));

                    const btnRemove = document.createElement('button');
                    btnRemove.type = 'button';
                    btnRemove.className = 'btn-remove';
                    btnRemove.innerHTML = 'Remove';
                    btnRemove.addEventListener('click', () => removeEntry(index));

                    tdActions.appendChild(btnEdit);
                    tdActions.appendChild(btnRemove);
                    tr.appendChild(tdActions);

                    scheduleTableBody.appendChild(tr);
                });
            }

            // Remove
            function removeEntry(index) {
                if (confirm('Are you sure you want to remove this schedule entry?')) {
                    schedule.splice(index, 1);
                    saveScheduleToLocalStorage();
                    renderSchedule();
                }
            }

            // Edit modal
            function openEditModal(index) {
                const entry = schedule[index];
                editIndexInput.value = index;
                editStudentSelect.value = entry.student;
                editInstructorSelect.value = entry.instructor;
                editSimulatorSelect.value = entry.simulator;
                editTimeFromInput.value = entry.from;
                editTimeToInput.value = entry.to;
                editDateInput.value = entry.date;

                bsEditModal.show();
            }

            function isFormValid(formElement) {
                return formElement.checkValidity();
            }

            // Submit new entry
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (!isFormValid(form)) {
                    form.reportValidity();
                    return;
                }

                const student = studentSelect.value;
                const instructor = instructorSelect.value;
                const simulator = simulatorSelect.value;
                const from = timeFromInput.value;
                const to = timeToInput.value;

                if (to <= from) {
                    alert('Error: "To" time must be later than "From" time.');
                    return;
                }

                const today = new Date();
                const yyyy = today.getFullYear();
                const mm = String(today.getMonth() + 1).padStart(2, '0');
                const dd = String(today.getDate()).padStart(2, '0');
                const date = `${yyyy}-${mm}-${dd}`;

                const totalHours = calcTotalHours(from, to);

                schedule.push({
                    date,
                    student,
                    from,
                    to,
                    totalHours,
                    instructor,
                    simulator
                });

                saveScheduleToLocalStorage();
                renderSchedule();
                form.reset();
            });

            // Submit edit
            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!isFormValid(editForm)) {
                    editForm.reportValidity();
                    return;
                }

                const index = parseInt(editIndexInput.value, 10);
                const student = editStudentSelect.value;
                const instructor = editInstructorSelect.value;
                const simulator = editSimulatorSelect.value;
                const from = editTimeFromInput.value;
                const to = editTimeToInput.value;
                const date = editDateInput.value;

                if (to <= from) {
                    alert('Error: "To" time must be later than "From" time.');
                    return;
                }

                const totalHours = calcTotalHours(from, to);

                schedule[index] = {
                    date,
                    student,
                    from,
                    to,
                    totalHours,
                    instructor,
                    simulator
                };

                saveScheduleToLocalStorage();
                bsEditModal.hide();
                renderSchedule();
            });

            // Initial render
            renderSchedule();
        })();
    </script>
@endsection
