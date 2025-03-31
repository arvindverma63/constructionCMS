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

                <h1 class="app-page-title">Schedule</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Project Timeline</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Search by task or project..." id="searchInput" style="max-width: 200px;">
                                    <a class="btn app-btn-primary" href="#">
                                        <i class="fas fa-plus me-2"></i>Add Task
                                    </a>
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
                                <label for="statusFilter" class="me-2">Filter by Status:</label>
                                <select id="statusFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All Statuses</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Delayed">Delayed</option>
                                </select>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="scheduleTable">
                                <thead>
                                    <tr>
                                        <th class="cell">Project</th>
                                        <th class="cell">Task</th>
                                        <th class="cell">Start Date</th>
                                        <th class="cell">End Date</th>
                                        <th class="cell">Days Remaining</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-project="Residential Complex - Phase 1">Residential Complex - Phase 1</td>
                                        <td class="cell" data-task="Foundation Work">Foundation Work</td>
                                        <td class="cell">2025-03-15</td>
                                        <td class="cell">2025-04-15</td>
                                        <td class="cell">15</td>
                                        <td class="cell" data-status="In Progress"><span class="badge bg-primary">In Progress</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Completed" onclick="toggleStatus(this, 'Completed')"><i class="fas fa-check"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Commercial Building - Downtown">Commercial Building - Downtown</td>
                                        <td class="cell" data-task="Structural Framing">Structural Framing</td>
                                        <td class="cell">2025-04-01</td>
                                        <td class="cell">2025-06-30</td>
                                        <td class="cell">91</td>
                                        <td class="cell" data-status="Not Started"><span class="badge bg-secondary">Not Started</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Start Task" onclick="toggleStatus(this, 'In Progress')"><i class="fas fa-play"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Bridge Reconstruction">Bridge Reconstruction</td>
                                        <td class="cell" data-task="Concrete Pouring">Concrete Pouring</td>
                                        <td class="cell">2025-03-20</td>
                                        <td class="cell">2025-04-05</td>
                                        <td class="cell">5</td>
                                        <td class="cell" data-status="In Progress"><span class="badge bg-primary">In Progress</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Completed" onclick="toggleStatus(this, 'Completed')"><i class="fas fa-check"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="School Expansion">School Expansion</td>
                                        <td class="cell" data-task="Roof Installation">Roof Installation</td>
                                        <td class="cell">2025-02-15</td>
                                        <td class="cell">2025-03-01</td>
                                        <td class="cell">0</td>
                                        <td class="cell" data-status="Completed"><span class="badge bg-success">Completed</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="View"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Bridge Reconstruction">Bridge Reconstruction</td>
                                        <td class="cell" data-task="Deck Finishing">Deck Finishing</td>
                                        <td class="cell">2025-03-25</td>
                                        <td class="cell">2025-03-30</td>
                                        <td class="cell">-1</td>
                                        <td class="cell" data-status="Delayed"><span class="badge bg-danger">Delayed</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Mark Completed" onclick="toggleStatus(this, 'Completed')"><i class="fas fa-check"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 5 of 15 tasks</small>
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
            const rows = document.querySelectorAll('#scheduleTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project').toLowerCase();
                const task = row.querySelector('td[data-task]').getAttribute('data-task').toLowerCase();
                row.style.display = project.includes(searchValue) || task.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        function applyFilters() {
            const projectFilter = document.getElementById('projectFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            const rows = document.querySelectorAll('#scheduleTable tbody tr');

            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project');
                const status = row.querySelector('td[data-status]').getAttribute('data-status');
                const matchesProject = !projectFilter || project === projectFilter;
                const matchesStatus = !statusFilter || status === statusFilter;
                row.style.display = matchesProject && matchesStatus ? '' : 'none';
            });
        }

        document.getElementById('projectFilter').addEventListener('change', applyFilters);
        document.getElementById('statusFilter').addEventListener('change', applyFilters);

        // Toggle Status
        function toggleStatus(button, newStatus) {
            const row = button.closest('tr');
            const statusCell = row.querySelector('td[data-status]');
            statusCell.setAttribute('data-status', newStatus);
            if (newStatus === 'Completed') {
                statusCell.innerHTML = '<span class="badge bg-success">Completed</span>';
                button.remove(); // Remove the "Mark Completed" button
            } else if (newStatus === 'In Progress') {
                statusCell.innerHTML = '<span class="badge bg-primary">In Progress</span>';
                button.outerHTML = '<a href="#" class="btn-sm app-btn-secondary" title="Mark Completed" onclick="toggleStatus(this, \'Completed\')"><i class="fas fa-check"></i></a>';
            }
            updateDaysRemaining(row);
        }

        // Update Days Remaining (based on current date: March 31, 2025)
        function updateDaysRemaining(row) {
            const endDateStr = row.querySelector('td:nth-child(4)').textContent;
            const endDate = new Date(endDateStr);
            const currentDate = new Date('2025-03-31');
            const timeDiff = endDate - currentDate;
            const daysRemaining = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
            row.querySelector('td:nth-child(5)').textContent = daysRemaining >= 0 ? daysRemaining : -daysRemaining;
            if (daysRemaining < 0 && row.querySelector('td[data-status]').getAttribute('data-status') !== 'Completed') {
                row.querySelector('td[data-status]').setAttribute('data-status', 'Delayed');
                row.querySelector('td[data-status]').innerHTML = '<span class="badge bg-danger">Delayed</span>';
            }
        }

        // Initialize Days Remaining on Load
        document.querySelectorAll('#scheduleTable tbody tr').forEach(row => updateDaysRemaining(row));
    </script>
</body>

</html>
