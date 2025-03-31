<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.partials.head')
</head>

<body class="app">
    @include('Admin.partials.header')

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Attendance</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Daily Attendance</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Search by name..." id="searchInput" style="max-width: 200px;">
                                    <a class="btn app-btn-secondary" href="#" title="Export to CSV">
                                        <i class="fas fa-download me-2"></i>Export
                                    </a>
                                </div>
                            </div><!--//col-->
                        </div><!--//row-->
                        <div class="row g-3 mt-3">
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
                                <label for="dateFilter" class="me-2">Date:</label>
                                <input type="date" id="dateFilter" class="form-control" value="2025-03-31" style="width: auto; display: inline-block;">
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="attendanceTable">
                                <thead>
                                    <tr>
                                        <th class="cell">Name</th>
                                        <th class="cell">Role</th>
                                        <th class="cell">Project</th>
                                        <th class="cell">Attendance</th>
                                        <th class="cell">Hours Worked</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-name="Ramesh Patel"><a href="#">Ramesh Patel</a></td>
                                        <td class="cell">Mason</td>
                                        <td class="cell" data-project="Residential Complex - Phase 1">Residential Complex - Phase 1</td>
                                        <td class="cell" data-attendance="Present"><span class="badge bg-success">Present</span></td>
                                        <td class="cell">8</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="Toggle Attendance" onclick="toggleAttendance(this)"><i class="fas fa-user-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-name="Priya Sharma"><a href="#">Priya Sharma</a></td>
                                        <td class="cell">Site Supervisor</td>
                                        <td class="cell" data-project="Commercial Building - Downtown">Commercial Building - Downtown</td>
                                        <td class="cell" data-attendance="Present"><span class="badge bg-success">Present</span></td>
                                        <td class="cell">9</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="Toggle Attendance" onclick="toggleAttendance(this)"><i class="fas fa-user-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-name="Vikram Singh"><a href="#">Vikram Singh</a></td>
                                        <td class="cell">Laborer</td>
                                        <td class="cell" data-project="Bridge Reconstruction">Bridge Reconstruction</td>
                                        <td class="cell" data-attendance="Absent"><span class="badge bg-danger">Absent</span></td>
                                        <td class="cell">0</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="Toggle Attendance" onclick="toggleAttendance(this)"><i class="fas fa-user-check"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-name="Anita Desai"><a href="#">Anita Desai</a></td>
                                        <td class="cell">Electrician</td>
                                        <td class="cell" data-project="School Expansion">School Expansion</td>
                                        <td class="cell" data-attendance="Present"><span class="badge bg-success">Present</span></td>
                                        <td class="cell">7</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="Toggle Attendance" onclick="toggleAttendance(this)"><i class="fas fa-user-times"></i></a>
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
            const rows = document.querySelectorAll('#attendanceTable tbody tr');
            rows.forEach(row => {
                const name = row.querySelector('td[data-name]').getAttribute('data-name').toLowerCase();
                row.style.display = name.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        function applyFilters() {
            const projectFilter = document.getElementById('projectFilter').value;
            const rows = document.querySelectorAll('#attendanceTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project');
                row.style.display = !projectFilter || project === projectFilter ? '' : 'none';
            });
        }

        document.getElementById('projectFilter').addEventListener('change', applyFilters);
        document.getElementById('dateFilter').addEventListener('change', function() {
            // Placeholder for date-based filtering (would require backend data)
            console.log('Date filter changed to:', this.value);
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
                row.querySelector('td:nth-child(5)').textContent = '0';
            } else {
                attendanceCell.setAttribute('data-attendance', 'Present');
                attendanceCell.innerHTML = '<span class="badge bg-success">Present</span>';
                button.title = 'Mark Absent';
                button.innerHTML = '<i class="fas fa-user-times"></i>';
                row.querySelector('td:nth-child(5)').textContent = '8';
            }
        }
    </script>
</body>

</html>
