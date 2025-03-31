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

                <h1 class="app-page-title">Material Usage Reports</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Material Consumption</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Search by material..." id="searchInput" style="max-width: 200px;">
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
                            <table class="table table-hover mb-0" id="materialTable">
                                <thead>
                                    <tr>
                                        <th class="cell">Material Name</th>
                                        <th class="cell">Project</th>
                                        <th class="cell">Quantity Used</th>
                                        <th class="cell">Cost (₹)</th>
                                        <th class="cell">Stock Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-material="Cement Bags"><a href="#">Cement Bags</a></td>
                                        <td class="cell" data-project="Residential Complex - Phase 1">Residential Complex - Phase 1</td>
                                        <td class="cell">200</td>
                                        <td class="cell">₹1,00,000</td>
                                        <td class="cell">50</td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-material="Steel Rods"><a href="#">Steel Rods</a></td>
                                        <td class="cell" data-project="Bridge Reconstruction">Bridge Reconstruction</td>
                                        <td class="cell">150</td>
                                        <td class="cell">₹2,25,000</td>
                                        <td class="cell">200</td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-material="Bricks"><a href="#">Bricks</a></td>
                                        <td class="cell" data-project="School Expansion">School Expansion</td>
                                        <td class="cell">10,000</td>
                                        <td class="cell">₹1,80,000</td>
                                        <td class="cell">2,000</td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-material="Concrete"><a href="#">Concrete</a></td>
                                        <td class="cell" data-project="Commercial Building - Downtown">Commercial Building - Downtown</td>
                                        <td class="cell">50 m³</td>
                                        <td class="cell">₹2,50,000</td>
                                        <td class="cell">10 m³</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 4 of 10 materials</small>
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
            const rows = document.querySelectorAll('#materialTable tbody tr');
            rows.forEach(row => {
                const material = row.querySelector('td[data-material]').getAttribute('data-material').toLowerCase();
                row.style.display = material.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        document.getElementById('projectFilter').addEventListener('change', function() {
            const filterValue = this.value;
            const rows = document.querySelectorAll('#materialTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project');
                row.style.display = !filterValue || project === filterValue ? '' : 'none';
            });
        });
    </script>
</body>

</html>
