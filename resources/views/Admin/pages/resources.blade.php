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

                <h1 class="app-page-title">Resources</h1>

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Resource Inventory</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <a class="btn app-btn-primary" href="#">
                                    <i class="fas fa-plus me-2"></i>Add Resource
                                </a>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="cell">Resource Name</th>
                                        <th class="cell">Category</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Quantity</th>
                                        <th class="cell">Cost (₹)</th>
                                        <th class="cell">Last Maintenance</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell"><a href="#">Concrete Mixer</a></td>
                                        <td class="cell">Equipment</td>
                                        <td class="cell"><span class="badge bg-success">Available</span></td>
                                        <td class="cell">3</td>
                                        <td class="cell">₹1,50,000</td>
                                        <td class="cell">2025-03-15</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Maintenance"><i class="fas fa-tools"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><a href="#">Cement Bags</a></td>
                                        <td class="cell">Material</td>
                                        <td class="cell"><span class="badge bg-warning">Low Stock</span></td>
                                        <td class="cell">50</td>
                                        <td class="cell">₹25,000</td>
                                        <td class="cell">N/A</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Edit"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><a href="#">Crane</a></td>
                                        <td class="cell">Equipment</td>
                                        <td class="cell"><span class="badge bg-danger">In Use</span></td>
                                        <td class="cell">1</td>
                                        <td class="cell">₹5,00,000</td>
                                        <td class="cell">2025-02-20</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Maintenance"><i class="fas fa-tools"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><a href="#">Steel Rods</a></td>
                                        <td class="cell">Material</td>
                                        <td class="cell"><span class="badge bg-success">Available</span></td>
                                        <td class="cell">200</td>
                                        <td class="cell">₹3,00,000</td>
                                        <td class="cell">N/A</td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Edit"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 4 of 15 resources</small>
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

</body>

</html>
