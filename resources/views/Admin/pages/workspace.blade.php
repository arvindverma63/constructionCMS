<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.partials.head')
    <style>
        .sortable:hover {
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>

<body class="app">
    @include('Admin.partials.header')

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Workforce</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Team Members</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Search by name..." id="searchInput" style="max-width: 200px;">
                                    <a class="btn app-btn-primary" href="#">
                                        <i class="fas fa-plus me-2"></i>Add Worker
                                    </a>
                                    <a class="btn app-btn-secondary" href="#" title="Export to CSV">
                                        <i class="fas fa-download me-2"></i>Export
                                    </a>
                                </div>
                            </div><!--//col-->
                        </div><!--//row-->
                        <div class="row g-3 mt-3">
                            <div class="col-auto">
                                <label for="roleFilter" class="me-2">Filter by Role:</label>
                                <select id="roleFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All Roles</option>
                                    <option value="Mason">Mason</option>
                                    <option value="Site Supervisor">Site Supervisor</option>
                                    <option value="Laborer">Laborer</option>
                                    <option value="Electrician">Electrician</option>
                                </select>
                            </div><!--//col-->
                            <div class="col-auto">
                                <label for="projectFilter" class="me-2">Filter by Project:</label>
                                <select id="projectFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All Projects</option>
                                    <option value="Residential Complex - Phase 1">Residential Complex - Phase 1</option>
                                    <option value="Commercial Building - Downtown">Commercial Building - Downtown</option>
                                    <option value="Bridge Reconstruction">Bridge Reconstruction</option>
                                    <option value="School Expansion">School Expansion</option>
                                </select>
                            </div><!--//col-->
                            <div class="col-auto">
                                <label for="attendanceFilter" class="me-2">Filter by Attendance:</label>
                                <select id="attendanceFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="workforceTable">
                                <thead>
                                    <tr>
                                        <th class="cell sortable" data-sort="name">Name <i class="fas fa-sort"></i></th>
                                        <th class="cell sortable" data-sort="role">Role <i class="fas fa-sort"></i></th>
                                        <th class="cell sortable" data-sort="project">Project <i class="fas fa-sort"></i></th>
                                        <th class="cell sortable" data-sort="attendance">Attendance <i class="fas fa-sort"></i></th>
                                        <th class="cell sortable" data-sort="wage">Daily Wage (₹) <i class="fas fa-sort"></i></th>
                                        <th class="cell">Hours Worked</th>
                                        <th class="cell">Skills</th>
                                        <th class="cell">Contact</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-name="Ramesh Patel"><a href="#">Ramesh Patel</a></td>
                                        <td class="cell" data-role="Mason">Mason</td>
                                        <td class="cell" data-project="Residential Complex - Phase 1">Residential Complex - Phase 1</td>
                                        <td class="cell" data-attendance="Present"><span class="badge bg-success">Present</span></td>
                                        <td class="cell" data-wage="800">₹800</td>
                                        <td class="cell">8</td>
                                        <td class="cell">Bricklaying, Plastering</td>
                                        <td class="cell">+91 98765 43210</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Absent" onclick="toggleAttendance(this)"><i class="fas fa-user-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-name="Priya Sharma"><a href="#">Priya Sharma</a></td>
                                        <td class="cell" data-role="Site Supervisor">Site Supervisor</td>
                                        <td class="cell" data-project="Commercial Building - Downtown">Commercial Building - Downtown</td>
                                        <td class="cell" data-attendance="Present"><span class="badge bg-success">Present</span></td>
                                        <td class="cell" data-wage="1200">₹1,200</td>
                                        <td class="cell">9</td>
                                        <td class="cell">Management, Safety Training</td>
                                        <td class="cell">+91 87654 32109</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Absent" onclick="toggleAttendance(this)"><i class="fas fa-user-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-name="Vikram Singh"><a href="#">Vikram Singh</a></td>
                                        <td class="cell" data-role="Laborer">Laborer</td>
                                        <td class="cell" data-project="Bridge Reconstruction">Bridge Reconstruction</td>
                                        <td class="cell" data-attendance="Absent"><span class="badge bg-danger">Absent</span></td>
                                        <td class="cell" data-wage="600">₹600</td>
                                        <td class="cell">0</td>
                                        <td class="cell">Manual Labor</td>
                                        <td class="cell">+91 76543 21098</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Present" onclick="toggleAttendance(this)"><i class="fas fa-user-check"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-name="Anita Desai"><a href="#">Anita Desai</a></td>
                                        <td class="cell" data-role="Electrician">Electrician</td>
                                        <td class="cell" data-project="School Expansion">School Expansion</td>
                                        <td class="cell" data-attendance="Present"><span class="badge bg-success">Present</span></td>
                                        <td class="cell" data-wage="900">₹900</td>
                                        <td class="cell">7</td>
                                        <td class="cell">Wiring, Circuit Installation</td>
                                        <td class="cell">+91 65432 10987</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Absent" onclick="toggleAttendance(this)"><i class="fas fa-user-times"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 4 of 25 workers</small>
                            </div><!--//col-->
                            <div class="col-auto">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-footer-->
                </div><!--//app-card-->

            </div><!--//container-xl-->
        </div><!--//app-content-->

       <!--//app-footer-->

    </div><!--//app-wrapper-->
    @include('Admin.partials.js')
    <script>
        // Search Functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#workforceTable tbody tr');
            rows.forEach(row => {
                const name = row.querySelector('td[data-name]').getAttribute('data-name').toLowerCase();
                row.style.display = name.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        function applyFilters() {
            const roleFilter = document.getElementById('roleFilter').value;
            const projectFilter = document.getElementById('projectFilter').value;
            const attendanceFilter = document.getElementById('attendanceFilter').value;
            const rows = document.querySelectorAll('#workforceTable tbody tr');

            rows.forEach(row => {
                const role = row.querySelector('td[data-role]').getAttribute('data-role');
                const project = row.querySelector('td[data-project]').getAttribute('data-project');
                const attendance = row.querySelector('td[data-attendance]').getAttribute('data-attendance');
                const matchesRole = !roleFilter || role === roleFilter;
                const matchesProject = !projectFilter || project === projectFilter;
                const matchesAttendance = !attendanceFilter || attendance === attendanceFilter;
                row.style.display = matchesRole && matchesProject && matchesAttendance ? '' : 'none';
            });
        }

        document.getElementById('roleFilter').addEventListener('change', applyFilters);
        document.getElementById('projectFilter').addEventListener('change', applyFilters);
        document.getElementById('attendanceFilter').addEventListener('change', applyFilters);

        // Sort Functionality
        document.querySelectorAll('.sortable').forEach(th => {
            th.addEventListener('click', function() {
                const sortKey = this.getAttribute('data-sort');
                const rows = Array.from(document.querySelectorAll('#workforceTable tbody tr'));
                const isNumeric = sortKey === 'wage';
                const ascending = this.classList.toggle('asc');

                rows.sort((a, b) => {
                    let aValue = a.querySelector(`td[data-${sortKey}]`).getAttribute(`data-${sortKey}`);
                    let bValue = b.querySelector(`td[data-${sortKey}]`).getAttribute(`data-${sortKey}`);
                    if (isNumeric) {
                        aValue = parseFloat(aValue);
                        bValue = parseFloat(bValue);
                        return ascending ? aValue - bValue : bValue - aValue;
                    }
                    return ascending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
                });

                const tbody = document.querySelector('#workforceTable tbody');
                rows.forEach(row => tbody.appendChild(row));
            });
        });

        // Toggle Attendance
        function toggleAttendance(button) {
            const row = button.closest('tr');
            const attendanceCell = row.querySelector('td[data-attendance]');
            const currentStatus = attendanceCell.getAttribute('data-attendance');
            if (currentStatus === 'Present') {
                attendanceCell.setAttribute('data-attendance', 'Absent');
                attendanceCell.innerHTML = '<span class="badge bg-danger">Absent</span>';
                button.title = 'Mark Present';
                button.innerHTML = '<i class="fas fa-user-check"></i>';
                row.querySelector('td:nth-child(6)').textContent = '0'; // Reset hours worked
            } else {
                attendanceCell.setAttribute('data-attendance', 'Present');
                attendanceCell.innerHTML = '<span class="badge bg-success">Present</span>';
                button.title = 'Mark Absent';
                button.innerHTML = '<i class="fas fa-user-times"></i>';
                row.querySelector('td:nth-child(6)').textContent = '8'; // Default hours worked
            }
        }
    </script>
</body>

</html>
