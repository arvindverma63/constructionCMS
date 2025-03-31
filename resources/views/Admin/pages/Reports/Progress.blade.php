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

                <h1 class="app-page-title">Progress Reports</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Project Progress Overview</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Search by project..." id="searchInput" style="max-width: 200px;">
                                    <a class="btn app-btn-secondary" href="#" title="Export to CSV">
                                        <i class="fas fa-download me-2"></i>Export
                                    </a>
                                </div>
                            </div><!--//col-->
                        </div><!--//row-->
                        <div class="row g-3 mt-3">
                            <div class="col-auto">
                                <label for="statusFilter" class="me-2">Filter by Status:</label>
                                <select id="statusFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All Statuses</option>
                                    <option value="Active">Active</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="progressTable">
                                <thead>
                                    <tr>
                                        <th class="cell">Project Name</th>
                                        <th class="cell">Progress</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Milestones Completed</th>
                                        <th class="cell">Days Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-project="Residential Complex - Phase 1"><a href="#">Residential Complex - Phase 1</a></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                            </div>
                                        </td>
                                        <td class="cell" data-status="Active"><span class="badge bg-success">Active</span></td>
                                        <td class="cell">4/6</td>
                                        <td class="cell">275</td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Commercial Building - Downtown"><a href="#">Commercial Building - Downtown</a></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                            </div>
                                        </td>
                                        <td class="cell" data-status="On Hold"><span class="badge bg-warning">On Hold</span></td>
                                        <td class="cell">3/8</td>
                                        <td class="cell">457</td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Bridge Reconstruction"><a href="#">Bridge Reconstruction</a></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                                            </div>
                                        </td>
                                        <td class="cell" data-status="Active"><span class="badge bg-success">Active</span></td>
                                        <td class="cell">5/7</td>
                                        <td class="cell">45</td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="School Expansion"><a href="#">School Expansion</a></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                            </div>
                                        </td>
                                        <td class="cell" data-status="Completed"><span class="badge bg-secondary">Completed</span></td>
                                        <td class="cell">5/5</td>
                                        <td class="cell">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 4 of 4 projects</small>
                            </div><!--//col-->
                            <div class="col-auto">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
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
            const rows = document.querySelectorAll('#progressTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project').toLowerCase();
                row.style.display = project.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        document.getElementById('statusFilter').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('#progressTable tbody tr');
            rows.forEach(row => {
                const status = row.querySelector('td[data-status]').getAttribute('data-status');
                row.style.display = !filterValue || status === filterValue ? '' : 'none';
            });
        });
    </script>
</body>

</html>
