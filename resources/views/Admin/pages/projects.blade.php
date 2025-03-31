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

                <h1 class="app-page-title">Projects</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">All Projects</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <a class="btn app-btn-primary" href="#">
                                    <i class="fas fa-plus me-2"></i>Add New Project
                                </a>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="cell">Project Name</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Progress</th>
                                        <th class="cell">Budget (₹)</th>
                                        <th class="cell">Start Date</th>
                                        <th class="cell">Deadline</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell"><a href="#">Residential Complex - Phase 1</a></td>
                                        <td class="cell"><span class="badge bg-success">Active</span></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 65%;" aria-valuenow="65" aria-valuemin="0"
                                                    aria-valuemax="100">65%</div>
                                            </div>
                                        </td>
                                        <td class="cell">₹12,62,800</td>
                                        <td class="cell">2025-01-15</td>
                                        <td class="cell">2025-12-31</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><a href="#">Commercial Building - Downtown</a></td>
                                        <td class="cell"><span class="badge bg-warning">On Hold</span></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 45%;" aria-valuenow="45" aria-valuemin="0"
                                                    aria-valuemax="100">45%</div>
                                            </div>
                                        </td>
                                        compactness <td class="cell">₹18,50,000</td>
                                        <td class="cell">2025-02-01</td>
                                        <td class="cell">2026-06-30</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><a href="#">Bridge Reconstruction</a></td>
                                        <td class="cell"><span class="badge bg-success">Active</span></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 80%;" aria-valuenow="80" aria-valuemin="0"
                                                    aria-valuemax="100">80%</div>
                                            </div>
                                        </td>
                                        <td class="cell">₹25,00,000</td>
                                        <td class="cell">2024-11-10</td>
                                        <td class="cell">2025-05-15</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><a href="#">School Expansion</a></td>
                                        <td class="cell"><span class="badge bg-secondary">Completed</span></td>
                                        <td class="cell">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                    style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                                                    aria-valuemax="100">100%</div>
                                            </div>
                                        </td>
                                        <td class="cell">₹8,75,000</td>
                                        <td class="cell">2024-09-01</td>
                                        <td class="cell">2025-03-01</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Edit"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 4 of 12 projects</small>
                            </div><!--//col-->
                            <div class="col-auto">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"
                                                aria-disabled="true">Previous</a>
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

</body>

</html>
