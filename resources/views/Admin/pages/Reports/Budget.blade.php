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

                <h1 class="app-page-title">Budget Reports</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Project Budget Overview</h4>
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
                                <label for="projectFilter" class="me-2">Filter by Project:</label>
                                <select id="projectFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All Projects</option>
                                    <option value="Residential Complex - Phase 1">Residential Complex - Phase 1</option>
                                    <option value="Commercial Building - Downtown">Commercial Building - Downtown</option>
                                    <option value="Bridge Reconstruction">Bridge Reconstruction</option>
                                    <option value="School Expansion">School Expansion</option>
                                </select>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="budgetTable">
                                <thead>
                                    <tr>
                                        <th class="cell">Project Name</th>
                                        <th class="cell">Total Budget (₹)</th>
                                        <th class="cell">Spent (₹)</th>
                                        <th class="cell">Remaining (₹)</th>
                                        <th class="cell">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-project="Residential Complex - Phase 1"><a href="#">Residential Complex - Phase 1</a></td>
                                        <td class="cell">₹12,62,800</td>
                                        <td class="cell">₹8,20,000</td>
                                        <td class="cell">₹4,42,800</td>
                                        <td class="cell"><span class="badge bg-success">On Budget</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Commercial Building - Downtown"><a href="#">Commercial Building - Downtown</a></td>
                                        <td class="cell">₹18,50,000</td>
                                        <td class="cell">₹10,00,000</td>
                                        <td class="cell">₹8,50,000</td>
                                        <td class="cell"><span class="badge bg-warning">At Risk</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Bridge Reconstruction"><a href="#">Bridge Reconstruction</a></td>
                                        <td class="cell">₹25,00,000</td>
                                        <td class="cell">₹20,00,000</td>
                                        <td class="cell">₹5,00,000</td>
                                        <td class="cell"><span class="badge bg-danger">Over Budget</span></td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="School Expansion"><a href="#">School Expansion</a></td>
                                        <td class="cell">₹8,75,000</td>
                                        <td class="cell">₹8,75,000</td>
                                        <td class="cell">₹0</td>
                                        <td class="cell"><span class="badge bg-secondary">Completed</span></td>
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
            const rows = document.querySelectorAll('#budgetTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project').toLowerCase();
                row.style.display = project.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        document.getElementById('projectFilter').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('#budgetTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project');
                row.style.display = !filterValue || project === filterValue ? '' : 'none';
            });
        });
    </script>
</body>

</html>
