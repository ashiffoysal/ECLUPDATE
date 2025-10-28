@extends('layouts.backend')
@section('title', 'Software Permissions')
@section('content')

    <div class="container">

<form action="{{ url('admin/admin-user/create') }}" method="POST">
        <div class="row">
          @csrf
            <div class="col-md-10 col-xl-10">
                <div class="card-body">
                    <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                        <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                            <div class="row mb-10">
                                <label class="col-lg-3 col-form-label text-lg-end">Role Type:<span
                                        class="required"></span></label>
                                <div class="col-lg-9 col-xl-7">
                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                        <select name="role" class="form-select form-select-solid">
                                            @foreach ($allroles as $roles)
                                                <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    @error('exam_type')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10">
                                <label class="col-lg-3 col-form-label text-lg-end">First Name:<span
                                        class="required"></span></label>
                                <div class="col-lg-9 col-xl-7">
                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                        <input class="form-control form-control-solid" type="text" name="first_name"
                                            placeholder="Enter First Name" value="">
                                        <input type="hidden" name="id" value="">
                                    </div>
                                    @error('first_name')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10">
                                <label class="col-lg-3 col-form-label text-lg-end">Last Name:<span
                                        class="required"></span></label>
                                <div class="col-lg-9 col-xl-7">
                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                        <input class="form-control form-control-solid" type="text" name="last_name"
                                            placeholder="Enter Last Name" value="">
                                    </div>
                                    @error('last_name')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10">
                                <label class="col-lg-3 col-form-label text-lg-end">Phone:<span
                                        class="required"></span></label>
                                <div class="col-lg-9 col-xl-7">
                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                        <input class="form-control form-control-solid" type="text" name="phone"
                                            placeholder="Enter Phone" value="">
                                    </div>
                                    @error('phone')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10">
                                <label class="col-lg-3 col-form-label text-lg-end">Email:<span
                                        class="required"></span></label>
                                <div class="col-lg-9 col-xl-7">
                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                        <input class="form-control form-control-solid" type="text" name="email"
                                            placeholder="Enter email" value="">
                                    </div>
                                    @error('email')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-10">
                                <label class="col-lg-3 col-form-label text-lg-end">Address:<span
                                        class="required"></span></label>
                                <div class="col-lg-9 col-xl-7">
                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                        <textarea class="form-control form-control-solid" name="address" placeholder="Enter Address"></textarea>
                                    </div>
                                    @error('address')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!---->

                            <!--  -->






                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <div class="card permission-card p-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h4 class="mb-0">Software Permissions</h4>
                            <div class="small-muted">Select permissions to grant a role or user.</div>
                        </div>

                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" id="selectAllGlobal">
                            <label class="form-check-label small-muted" for="selectAllGlobal">Select all</label>
                        </div>
                    </div>
                    <hr/>
                    <div id="permissionsContainer">

                        <!-- Category: Dashboard -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                                <div>
                                    <strong>Dashboard</strong>
                                    <div class="muted-desc">Access to main dashboard and summary views</div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input category-select-all" type="checkbox"
                                        data-category="Dashboard" id="cat-dashboard-all">
                                    <label class="form-check-label small-muted" for="cat-dashboard-all">All</label>
                                </div>
                            </div>

                            <div class="list-group list-group-flush mt-2" data-category="Dashboard">
                                <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                            value="view_dashboard" data-category="Dashboard">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div><strong>View Dashboard</strong></div>
                                        <div class="muted-desc">Can view dashboard overview and stats</div>
                                    </div>
                                    <span class="badge bg-light text-dark align-self-center">Read</span>
                                </label>
                            </div>
                        </div>

                        <!-- Category: Candidates -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                                <div>
                                    <strong>Candidates</strong>
                                    <div class="muted-desc">Candidate management and series data</div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input category-select-all" type="checkbox"
                                        data-category="Candidates" id="cat-candidates-all">
                                    <label class="form-check-label small-muted" for="cat-candidates-all">All</label>
                                </div>
                            </div>
                            <div class="list-group list-group-flush mt-2" data-category="Candidates">
                                <label class="list-group-item d-flex gap-2 align-items-start">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                            value="view_all_subject_candidates" data-category="Candidates">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div><strong>All Subjects Candidates</strong></div>
                                        <div class="muted-desc">Access list of all subject candidates</div>
                                    </div>
                                    <span class="badge bg-light text-dark align-self-center">Read</span>
                                </label>

                                <label class="list-group-item d-flex gap-2 align-items-start">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                            value="view_series_wise_candidates" data-category="Candidates">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div><strong>Series-Wise Candidates</strong></div>
                                        <div class="muted-desc">Access candidates grouped by series</div>
                                    </div>
                                    <span class="badge bg-light text-dark align-self-center">Read</span>
                                </label>
                            </div>
                        </div>

                        <!-- Category: Exam Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                                <div>
                                    <strong>Exam Section</strong>
                                    <div class="muted-desc">All exam booking and subject checking permissions</div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input category-select-all" type="checkbox"
                                        data-category="Exam Section" id="cat-exam-section-all">
                                    <label class="form-check-label small-muted" for="cat-exam-section-all">All</label>
                                </div>
                            </div>

                            <div class="list-group list-group-flush mt-2" data-category="Exam Section">
                                <label class="list-group-item d-flex gap-2 align-items-start">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                            value="all_exam_booking" data-category="Exam Section">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div><strong>All Exam Booking</strong></div>
                                        <div class="muted-desc">View and manage all exam bookings</div>
                                    </div>
                                    <span class="badge bg-light text-dark align-self-center">Write</span>
                                </label>

                                <label class="list-group-item d-flex gap-2 align-items-start">
                                    <div class="form-check mt-1">
                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                            value="subject_checking" data-category="Exam Section">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div><strong>Subject Checking</strong></div>
                                        <div class="muted-desc">Can check subjects for candidates</div>
                                    </div>
                                    <span class="badge bg-light text-dark align-self-center">Write</span>
                                </label>
                            </div>
                        </div>

                        <!-- Category: Other Exam Categories -->
                        @foreach (['GCSE Exam Booking', 'IGCSE Exam Booking', 'A Level Exam Booking', 'AS Level Exam Booking', 'Functional Skills Exam', 'ACCA Exam Booking', 'UCAS Request', 'Mock Test Request', 'Proctor Exams', 'IESB Request', 'Course Request', 'Course Request', 'Exam Course', 'EXAM TIMETABLES', 'CANDIDATE  INSTALMENT', 'SPECIAL-ACCESS CANDIDATE', 'NOTIFICATION', 'EXAM SERIES', 'APPS EXAM BOOKING', 'SUBJECT MANAGE', 'STUDENT LIST', 'RECEIVE PAYMENT', 'AGENT', 'SETTINGS', 'CONTACT MESSAGE', 'TERMS & CONDITION', 'RIVACY POLICY', 'BLOG SECTION', 'Candidate Exam Dates', 'For Seating Plan', 'Series', 'Unpaid Candidates', 'Supports', 'FS Tuition', 'Seating Plan', 'Invoice', 'AAT ACCA FS Exam Date & Time', 'Coupon', 'Blog Comment', 'Branch'] as $cat)
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                                    <div>
                                        <strong>{{ $cat }}</strong>
                                        <div class="muted-desc">Permissions for {{ $cat }}</div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input category-select-all" type="checkbox"
                                            data-category="{{ $cat }}" id="cat-{{ Str::slug($cat) }}-all">
                                        <label class="form-check-label small-muted"
                                            for="cat-{{ Str::slug($cat) }}-all">All</label>
                                    </div>
                                </div>

                                <div class="list-group list-group-flush mt-2" data-category="{{ $cat }}">
                                    <label class="list-group-item d-flex gap-2 align-items-start">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input permission-checkbox" type="checkbox"
                                                value="{{ Str::slug($cat) }}_view" data-category="{{ $cat }}">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div><strong>View {{ $cat }}</strong></div>
                                            <div class="muted-desc">Can view {{ $cat }} records</div>
                                        </div>
                                        <span class="badge bg-light text-dark align-self-center">Read</span>
                                    </label>

                                    <label class="list-group-item d-flex gap-2 align-items-start">
                                        <div class="form-check mt-1">
                                            <input class="form-check-input permission-checkbox" type="checkbox"
                                                value="{{ Str::slug($cat) }}_manage"
                                                data-category="{{ $cat }}">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div><strong>Manage {{ $cat }}</strong></div>
                                            <div class="muted-desc">Create, edit, or delete {{ $cat }} entries
                                            </div>
                                        </div>
                                        <span class="badge bg-light text-dark align-self-center">Write</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach


                        <!-- ✅ UCAS Request -->


                        <!-- ✅ Mock Test Request -->


                        <!-- ✅ Proctor Exams -->


                        <!-- ✅ IESB Request -->


                        <!-- ✅ Course Request -->



                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="small-muted">Selected: <span id="selectedCount">0</span></div>
                        <div>
                            <button id="btnClear" class="btn btn-outline-secondary btn-sm me-2">Clear</button>
                            <button id="btnSave" class="btn btn-primary btn-sm">Save permissions</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function() {
            const selectAllGlobal = document.getElementById('selectAllGlobal');
            const categoryToggles = [...document.querySelectorAll('.category-select-all')];
            const permissionCheckboxes = [...document.querySelectorAll('.permission-checkbox')];
            const selectedCountEl = document.getElementById('selectedCount');
            const btnClear = document.getElementById('btnClear');

            function updateSelectedCount() {
                selectedCountEl.textContent = permissionCheckboxes.filter(cb => cb.checked).length;
            }

            function updateCategoryState(category) {
                const catBoxes = permissionCheckboxes.filter(cb => cb.dataset.category === category);
                const catToggle = document.querySelector('.category-select-all[data-category="' + category + '"]');
                const checked = catBoxes.filter(cb => cb.checked).length;
                if (checked === 0) {
                    catToggle.checked = false;
                    catToggle.indeterminate = false;
                } else if (checked === catBoxes.length) {
                    catToggle.checked = true;
                    catToggle.indeterminate = false;
                } else {
                    catToggle.checked = false;
                    catToggle.indeterminate = true;
                }
            }

            function updateGlobalState() {
                const checked = permissionCheckboxes.filter(cb => cb.checked).length;
                if (checked === 0) {
                    selectAllGlobal.checked = false;
                    selectAllGlobal.indeterminate = false;
                } else if (checked === permissionCheckboxes.length) {
                    selectAllGlobal.checked = true;
                    selectAllGlobal.indeterminate = false;
                } else {
                    selectAllGlobal.checked = false;
                    selectAllGlobal.indeterminate = true;
                }
            }

            permissionCheckboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    updateSelectedCount();
                    updateCategoryState(cb.dataset.category);
                    updateGlobalState();
                });
            });

            categoryToggles.forEach(t => {
                t.addEventListener('change', () => {
                    const cat = t.dataset.category;
                    const catBoxes = permissionCheckboxes.filter(cb => cb.dataset.category === cat);
                    catBoxes.forEach(cb => cb.checked = t.checked);
                    updateSelectedCount();
                    updateGlobalState();
                });
            });

            selectAllGlobal.addEventListener('change', () => {
                permissionCheckboxes.forEach(cb => cb.checked = selectAllGlobal.checked);
                categoryToggles.forEach(update => update.checked = selectAllGlobal.checked);
                updateSelectedCount();
            });

            btnClear.addEventListener('click', () => {
                permissionCheckboxes.forEach(cb => cb.checked = false);
                categoryToggles.forEach(t => {
                    t.checked = false;
                    t.indeterminate = false;
                });
                selectAllGlobal.checked = false;
                selectAllGlobal.indeterminate = false;
                updateSelectedCount();
            });

            updateSelectedCount();
            const cats = [...new Set(permissionCheckboxes.map(b => b.dataset.category))];
            cats.forEach(updateCategoryState);
            updateGlobalState();
        })();
    </script>

@endsection
