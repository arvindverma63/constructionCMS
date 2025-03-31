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

                <h1 class="app-page-title">Construction Dashboard</h1>

                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <h3 class="mb-3">Welcome, Construction Manager!</h3>
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">
                                    <div>This construction management dashboard provides real-time insights into your projects, budgets, and resources. Monitor progress and make informed decisions efficiently.</div>
                                </div><!--//col-->
                                <div class="col-12 col-lg-3">
                                    <a class="btn app-btn-primary" href="#">
                                        <i class="fas fa-file-arrow-down me-2"></i>Download Reports
                                    </a>
                                </div><!--//col-->
                            </div><!--//row-->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!--//app-card-body-->
                    </div><!--//inner-->
                </div><!--//app-card-->

                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Project Budget</h4>
                                <div class="stats-figure">₹12,62,800</div>
                                <div class="stats-meta text-success">
                                    <i class="fas fa-arrow-up"></i> 15%
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Expenses</h4>
                                <div class="stats-figure">₹2,25,000</div>
                                <div class="stats-meta text-danger">
                                    <i class="fas fa-arrow-up"></i> 8%
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Active Projects</h4>
                                <div class="stats-figure">8</div>
                                <div class="stats-meta text-success">
                                    <i class="fas fa-arrow-up"></i> 2
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Workers</h4>
                                <div class="stats-figure">245</div>
                                <div class="stats-meta text-success">
                                    <i class="fas fa-arrow-down"></i> 10
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->

                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-progress-list h-100 shadow-sm">
                            <div class="app-card-header p-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Project Progress</h4>
                                    </div><!--//col-->
                                    <div class="col-auto">
                                        <div class="card-header-action">
                                            <a href="#">All Projects</a>
                                        </div><!--//card-header-actions-->
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//app-card-body-->
                            <div class="app-card-body">
                                <div class="item p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="title mb-1">Residential Complex - Phase 1</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div><!--//col-->
                                        <div class="col-auto">
                                            <i class="fas fa-chevron-right"></i>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <a class="item-link-mask" href="#"></a>
                                </div><!--//item-->
                                <div class="item p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="title mb-1">Commercial Building - Downtown</div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div><!--//col-->
                                        <div class="col-auto">
                                            <i class="fas fa-chevron-right"></i>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                    <a class="item-link-mask" href="#"></a>
                                </div><!--//item-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//col-->

                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-stats-table h-100 shadow-sm">
                            <div class="app-card-header p-3">
                                <h4 class="app-card-title">Material Costs</h4>
                            </div><!--//app-card-header-->
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th class="meta">Material</th>
                                                <th class="meta stat-cell">Cost</th>
                                                <th class="meta stat-cell">Trend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cement</td>
                                                <td class="stat-cell">₹3,50,000</td>
                                                <td class="stat-cell">
                                                    <i class="fas fa-arrow-up text-success"></i> 5%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Steel</td>
                                                <td class="stat-cell">₹5,20,000</td>
                                                <td class="stat-cell">
                                                    <i class="fas fa-arrow-down text-danger"></i> 3%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bricks</td>
                                                <td class="stat-cell">₹1,80,000</td>
                                                <td class="stat-cell">
                                                    <i class="fas fa-arrow-up text-success"></i> 2%
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->

                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <i class="fas fa-truck-loading"></i>
                                        </div><!--//icon-holder-->
                                    </div><!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Equipment</h4>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//app-card-header-->
                            <div class="app-card-body px-3 py-4">
                                <div class="intro">Manage construction equipment and machinery.</div>
                            </div><!--//app-card-body-->
                            <!--//app-card-footer-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <i class="fas fa-users"></i>
                                        </div><!--//icon-holder-->
                                    </div><!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Workforce</h4>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//app-card-header-->
                            <div class="app-card-body px-3 py-4">
                                <div class="intro">Track labor allocation and attendance.</div>
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div><!--//icon-holder-->
                                    </div><!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Schedule</h4>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//app-card-header-->
                            <div class="app-card-body px-3 py-4">
                                <div class="intro">Monitor project timelines and deadlines.</div>
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->

            </div><!--//container-fluid-->
        </div><!--//app-content-->


    </div><!--//app-wrapper-->
    @include('Admin.partials.js')

</body>

</html>
