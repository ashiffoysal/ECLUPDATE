@extends('layouts.backend')
@section('title', 'Admin-User')
@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">

          <div class="card permission-card p-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div>
                <h4 class="mb-0">Software Permissions</h4>
                <div class="small-muted">Select permissions to grant a role or user.</div>
              </div>

              <div class="d-flex align-items-center gap-2">
            
                <div class="form-check ms-2">
             
                  <label class="form-check-label small-muted" for="selectAllGlobal">Select all</label>
                </div>
              </div>
            </div>

            <hr />

            <div id="permissionsContainer">
              <!-- Category: Users -->
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                  <div>
                    <strong>Users</strong>
                    <div class="muted-desc">Permissions related to user accounts</div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input category-select-all" type="checkbox" id="cat-users-all" data-category="Users">
                    <label class="form-check-label small-muted" for="cat-users-all">All</label>
                  </div>
                </div>

                <div class="list-group list-group-flush mt-2" data-category="Users">
                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="view_users" id="perm-view-users" data-category="Users">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>View users</strong></div>
                      <div class="muted-desc">Can view the list of users and their basic profile information</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Read</span>
                  </label>

                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="edit_users" id="perm-edit-users" data-category="Users">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>Edit users</strong></div>
                      <div class="muted-desc">Can create and edit user accounts, change roles and reset passwords</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Write</span>
                  </label>
                </div>
              </div>

              <!-- Category: Exams -->
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                  <div>
                    <strong>Exams</strong>
                    <div class="muted-desc">Create and manage exam papers and sessions</div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input category-select-all" type="checkbox" id="cat-exams-all" data-category="Exams">
                    <label class="form-check-label small-muted" for="cat-exams-all">All</label>
                  </div>
                </div>

                <div class="list-group list-group-flush mt-2" data-category="Exams">
                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="view_exams" id="perm-view-exams" data-category="Exams">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>View exams</strong></div>
                      <div class="muted-desc">See exam listings, dates and details</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Read</span>
                  </label>

                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="manage_exams" id="perm-manage-exams" data-category="Exams">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>Manage exams</strong></div>
                      <div class="muted-desc">Create, edit and cancel exam sessions</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Write</span>
                  </label>

                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="grade_exams" id="perm-grade-exams" data-category="Exams">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>Grade exams</strong></div>
                      <div class="muted-desc">Mark and release exam results</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Write</span>
                  </label>
                </div>
              </div>

              <!-- Category: Settings -->
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between p-2 category-header rounded">
                  <div>
                    <strong>Settings</strong>
                    <div class="muted-desc">System configuration and integrations</div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input category-select-all" type="checkbox" id="cat-settings-all" data-category="Settings">
                    <label class="form-check-label small-muted" for="cat-settings-all">All</label>
                  </div>
                </div>

                <div class="list-group list-group-flush mt-2" data-category="Settings">
                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="view_settings" id="perm-view-settings" data-category="Settings">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>View settings</strong></div>
                      <div class="muted-desc">Read-only access to configuration pages</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Read</span>
                  </label>

                  <label class="list-group-item d-flex gap-2 align-items-start permission-item">
                    <div class="form-check mt-1">
                      <input class="form-check-input permission-checkbox" type="checkbox" value="manage_integrations" id="perm-manage-integrations" data-category="Settings">
                    </div>
                    <div class="flex-grow-1">
                      <div><strong>Manage integrations</strong></div>
                      <div class="muted-desc">Edit API keys and third-party integrations</div>
                    </div>
                    <span class="badge bg-light text-dark align-self-center">Admin</span>
                  </label>
                </div>
              </div>

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
    </div>

    <!-- Bootstrap JS bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      // Core JS for handling select-all, indeterminate state, search and count
      (function (){
        const selectAllGlobal = document.getElementById('selectAllGlobal');
        const categoryToggles = Array.from(document.querySelectorAll('.category-select-all'));
        const permissionCheckboxes = Array.from(document.querySelectorAll('.permission-checkbox'));
        const selectedCountEl = document.getElementById('selectedCount');
        const searchInput = document.getElementById('globalSearch');
        const btnClear = document.getElementById('btnClear');

        function updateSelectedCount(){
          const n = permissionCheckboxes.filter(cb=>cb.checked).length;
          selectedCountEl.textContent = n;
        }

        function updateCategoryState(category){
          const catBoxes = permissionCheckboxes.filter(cb=>cb.dataset.category===category && cb.offsetParent !== null);
          const catToggle = document.querySelector('.category-select-all[data-category="'+category+'"]');
          if(!catToggle) return;

          const checked = catBoxes.filter(cb=>cb.checked).length;
          if(checked === 0){
            catToggle.checked = false;
            catToggle.indeterminate = false;
          } else if(checked === catBoxes.length){
            catToggle.checked = true;
            catToggle.indeterminate = false;
          } else {
            catToggle.checked = false;
            catToggle.indeterminate = true;
          }
        }

        function updateGlobalState(){
          const visibleBoxes = permissionCheckboxes.filter(cb=>cb.offsetParent !== null);
          const checkedVisible = visibleBoxes.filter(cb=>cb.checked).length;
          if(checkedVisible === 0){
            selectAllGlobal.checked = false;
            selectAllGlobal.indeterminate = false;
          } else if(checkedVisible === visibleBoxes.length){
            selectAllGlobal.checked = true;
            selectAllGlobal.indeterminate = false;
          } else {
            selectAllGlobal.checked = false;
            selectAllGlobal.indeterminate = true;
          }
        }

        // When any individual permission toggles
        permissionCheckboxes.forEach(cb=>{
          cb.addEventListener('change', ()=>{
            updateSelectedCount();
            updateCategoryState(cb.dataset.category);
            updateGlobalState();
          });
        });

        // When a category "All" is toggled
        categoryToggles.forEach(t=>{
          t.addEventListener('change', ()=>{
            const cat = t.dataset.category;
            const catBoxes = permissionCheckboxes.filter(cb=>cb.dataset.category===cat && cb.offsetParent !== null);
            catBoxes.forEach(cb=> cb.checked = t.checked);
            updateSelectedCount();
            updateGlobalState();
          });
        });

        // Global select all toggles visible checkboxes
        selectAllGlobal.addEventListener('change', ()=>{
          const visibleBoxes = permissionCheckboxes.filter(cb=>cb.offsetParent !== null);
          visibleBoxes.forEach(cb=> cb.checked = selectAllGlobal.checked);
          // Update category toggles as well
          const categories = Array.from(new Set(visibleBoxes.map(b=>b.dataset.category)));
          categories.forEach(updateCategoryState);
          updateSelectedCount();
        });

        // Search/filter
        function applySearchFilter(){
          const q = (searchInput.value || '').trim().toLowerCase();
          permissionCheckboxes.forEach(cb=>{
            const label = cb.closest('label').innerText.toLowerCase();
            const container = cb.closest('[data-category]');
            const shouldShow = q === '' || label.indexOf(q) !== -1;
            cb.closest('label').style.display = shouldShow ? '' : 'none';
          });
          // After filtering, update category & global state because visible set changed
          const categories = Array.from(new Set(permissionCheckboxes.map(b=>b.dataset.category)));
          categories.forEach(updateCategoryState);
          updateGlobalState();
        }

        searchInput.addEventListener('input', applySearchFilter);

        // Clear button
        btnClear.addEventListener('click', ()=>{
          permissionCheckboxes.forEach(cb=> cb.checked = false);
          categoryToggles.forEach(t=> { t.checked = false; t.indeterminate = false; });
          selectAllGlobal.checked = false; selectAllGlobal.indeterminate = false;
          updateSelectedCount();
        });

        // initial state
        updateSelectedCount();
        // ensure category states are correct on load
        Array.from(new Set(permissionCheckboxes.map(b=>b.dataset.category))).forEach(updateCategoryState);
        updateGlobalState();

        // Save button — example hook (customise to your backend)
        document.getElementById('btnSave').addEventListener('click', ()=>{
          const selected = permissionCheckboxes.filter(cb=>cb.checked).map(cb=>cb.value);
          // Replace with AJAX/Fetch to your server or pass to form
          console.log('Selected permissions:', selected);
          // Visual feedback
          const btn = document.getElementById('btnSave');
          btn.classList.add('disabled');
          btn.textContent = 'Saved';
          setTimeout(()=>{ btn.classList.remove('disabled'); btn.textContent = 'Save permissions'; }, 900);
        });

      })();
    </script>


@endsection