<!DOCTYPE html>
<html lang="en">
<head>
    @include('website.partials.head')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/30" alt="Constructify Logo" class="me-2">
                Constructify
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/30" alt="User Profile" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Find Your Perfect Contractor</h1>
            <p class="lead">Explore top-rated professionals in your area.</p>
            <div class="input-group w-50 mx-auto mt-3">
                <input type="text" class="form-control" placeholder="Search by location or service..." id="heroSearch">
                <button class="btn btn-light" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <div id="suggestions" class="list-group w-50 mx-auto mt-2" style="display: none;">
                <a href="#" class="list-group-item list-group-item-action">Kanpur</a>
                <a href="#" class="list-group-item list-group-item-action">Delhi</a>
                <a href="#" class="list-group-item list-group-item-action">Mumbai</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Filters</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="sort" class="form-label">Sort</label>
                            <select class="form-select" id="sort">
                                <option selected>Reviews (high to low)</option>
                                <option>Reviews (low to high)</option>
                                <option>Rating (high to low)</option>
                                <option>Price (low to high)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="search" class="form-label">Search for</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" value="Kanpur" placeholder="Enter location">
                                <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </button>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">Categories</h6>
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="architect" checked> Architect
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="civilContractor" checked> Civil Contractor
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="civilEngineer" checked> Civil Engineer
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="colorContractor" checked> Color Contractor
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="electricalContractor" checked> Electrical Contractor
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="furnitureContractor" checked> Furniture Contractor
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="interiorDesigner" checked> Interior Designer
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="plumbingContractor" checked> Plumbing Contractor
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="ceilingContractor"> Ceiling Contractor
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-2" type="checkbox" id="structuralEngineer"> Structural Engineer
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 mt-3" id="applyFilters">Apply Filters</button>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title mb-0">Kanpur</h4>
                            <div>
                                <button class="btn btn-outline-primary btn-sm me-2" id="viewMap">View Map</button>
                                <button class="btn btn-outline-success btn-sm" id="addListing">Add Listing</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <!-- Service Provider Card -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="card-title mb-0">R.K. Construction</h5>
                                                <p class="text-muted mb-0">Joined Since: 12/10/2024</p>
                                                <div class="badge bg-warning text-dark mt-1">★★★★☆ (4.5)</div>
                                            </div>
                                            <div>
                                                <button class="btn btn-outline-secondary btn-sm me-2">Interior Designer</button>
                                                <button class="btn btn-outline-secondary btn-sm me-2">Architect</button>
                                                <button class="btn btn-outline-secondary btn-sm">Civil Engineer</button>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2">Specializing in residential and commercial projects with 10+ years of experience.</p>
                                        <div class="mt-3 d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="tel:+1234567890" class="btn btn-primary btn-sm">Call</a>
                                                <a href="#" class="btn btn-outline-primary btn-sm ms-2">Message</a>
                                            </div>
                                            <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#reviewsModal">View Reviews</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Another Service Provider Card -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="card-title mb-0">Sharma Builders</h5>
                                                <p class="text-muted mb-0">Joined Since: 05/15/2023</p>
                                                <div class="badge bg-success text-white mt-1">★★★★★ (5.0)</div>
                                            </div>
                                            <div>
                                                <button class="btn btn-outline-secondary btn-sm me-2">Civil Contractor</button>
                                                <button class="btn btn-outline-secondary btn-sm">Plumbing Contractor</button>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2">Expert in plumbing and structural solutions.</p>
                                        <div class="mt-3 d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="tel:+9876543210" class="btn btn-primary btn-sm">Call</a>
                                                <a href="#" class="btn btn-outline-primary btn-sm ms-2">Message</a>
                                            </div>
                                            <a href="#" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#reviewsModal">View Reviews</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-primary btn-lg">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Modal -->
    <div class="modal fade" id="reviewsModal" tabindex="-1" aria-labelledby="reviewsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewsModalLabel">Reviews</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>John Doe <span class="text-muted">| 03/20/2025</span></h6>
                            <div class="badge bg-warning text-dark">★★★★☆ (4.5)</div>
                            <p class="mt-2">Great service and timely completion. Highly recommended!</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>Jane Smith <span class="text-muted">| 02/15/2025</span></h6>
                            <div class="badge bg-success text-white">★★★★★ (5.0)</div>
                            <p class="mt-2">Excellent work, very professional team.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2025 Constructify. All rights reserved.</p>
            <div class="mt-2">
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    @include('website.partials.js')
</body>
</html>
