<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.partials.head')
    <style>
        body { background-color: #f4f7fa; color: #333333; }
        .modern-card { transition: all 0.3s; background: #ffffff; border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .modern-card:hover { transform: translateY(-5px); box-shadow: 0 12px 24px rgba(0,0,0,0.1); }
        .filter-section { background: linear-gradient(135deg, #ffffff 0%, #e9ecef 100%); border-bottom: 1px solid #dee2e6; }
        .property-image { height: 240px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px; }
        .badge-status { position: absolute; top: 15px; right: 15px; padding: 6px 12px; border-radius: 20px; font-weight: 600; }
        .search-form { background: #ffffff; border-radius: 15px; box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
        .form-control, .form-select { background: #f8f9fa; border-color: #ced4da; color: #333333; border-radius: 8px; }
        .form-control:focus, .form-select:focus { background: #ffffff; border-color: #007bff; color: #333333; box-shadow: 0 0 0 3px rgba(0,123,255,0.2); }
        .card-body { color: #333333; }
        .pagination .page-link { background: #ffffff; color: #333333; border-color: #dee2e6; }
        .pagination .page-item.active .page-link { background: #007bff; border-color: #007bff; color: #ffffff; }
        #map { background: #f8f9fa; border-radius: 12px; }
        .feature-icon { width: 18px; height: 18px; margin-right: 6px; }
        .progress { height: 10px; background: #e9ecef; border-radius: 5px; }
        .progress-bar { background: #28a745; border-radius: 5px; }
        .btn-primary { border-radius: 8px; padding: 10px 20px; }
        .sidebar-card { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>

<body>

    <main id="main">
        <!-- Search and Filter Section -->
        <section class="filter-section py-5">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold" style="color: #2c3e50;">Explore Construction Properties</h2>

                <form class="search-form p-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label for="location" class="form-label fw-bold">Location</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" class="form-control" id="location" placeholder="City or Area" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="property-type" class="form-label fw-bold">Property Type</label>
                            <select class="form-select" id="property-type">
                                <option value="">All Types</option>
                                <option value="residential">Residential</option>
                                <option value="commercial">Commercial</option>
                                <option value="industrial">Industrial</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="size-min" class="form-label fw-bold">Min Size (sqft)</label>
                            <input type="number" class="form-control" id="size-min" placeholder="Min" min="0">
                        </div>
                        <div class="col-md-2">
                            <label for="size-max" class="form-label fw-bold">Max Size (sqft)</label>
                            <input type="number" class="form-control" id="size-max" placeholder="Max" min="0">
                        </div>
                        <div class="col-md-2">
                            <label for="price-range" class="form-label fw-bold">Price Range</label>
                            <select class="form-select" id="price-range">
                                <option value="">Any Price</option>
                                <option value="0-500k">$0 - $500k</option>
                                <option value="500k-1m">$500k - $1m</option>
                                <option value="1m+">$1m+</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Results and Map Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <!-- Property Listings -->
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold" style="color: #2c3e50;">Available Properties <span class="badge bg-primary ms-2">12</span></h3>
                            <div class="d-flex align-items-center gap-3">
                                <select class="form-select w-auto">
                                    <option>Sort by: Latest</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                    <option>Size: Small to Large</option>
                                </select>
                                <button class="btn btn-outline-secondary btn-sm" title="Toggle Grid/List View">
                                    <i class="bi bi-grid-3x3-gap"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-md-2 g-4" id="property-results">
                            <!-- Property Card -->
                            <div class="col">
                                <div class="card modern-card">
                                    <img src="{{ asset('assets/img/constructions-1.jpg') }}" class="card-img-top property-image" alt="Property">
                                    <span class="badge bg-success badge-status">Available</span>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold" style="color: #2c3e50;">Luxury Apartments</h5>
                                        <p class="card-text text-muted mb-2">
                                            <i class="bi bi-geo-alt me-2"></i>Downtown District
                                        </p>
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="badge bg-light text-dark border"><i class="bi bi-house feature-icon"></i>Residential</span>
                                            <span class="badge bg-light text-dark border"><i class="bi bi-rulers feature-icon"></i>2000 sqft</span>
                                            <span class="badge bg-light text-dark border"><i class="bi bi-cash feature-icon"></i>$750,000</span>
                                        </div>
                                        <div class="progress mb-3">
                                            <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="small text-muted mb-3">Construction Progress: 65%</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-outline-warning btn-sm" title="Compare">
                                                    <i class="bi bi-bar-chart"></i>
                                                </button>
                                                <button class="btn btn-outline-success btn-sm" title="Save">
                                                    <i class="bi bi-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat card structure for more properties -->
                        </div>

                        <!-- Pagination -->
                        <nav class="mt-5">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>

                        <div id="no-results" class="text-center d-none">
                            <p class="text-muted">No properties found. Try adjusting your filters.</p>
                        </div>
                    </div>

                    <!-- Map and Filters Sidebar -->
                    <div class="col-lg-4">
                        <div class="sticky-top" style="top: 20px;">
                            <h4 class="fw-bold mb-3" style="color: #2c3e50;">Property Map</h4>
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body p-0">
                                    <div id="map" style="height: 300px;">
                                        <p class="text-center pt-5 text-muted">Map Loading...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-card p-4">
                                <h5 class="fw-bold mb-3" style="color: #2c3e50;">Advanced Filters</h5>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="nearby-schools">
                                    <label class="form-check-label" for="nearby-schools">Near Schools</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="nearby-transit">
                                    <label class="form-check-label" for="nearby-transit">Public Transit</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="new-listings">
                                    <label class="form-check-label" for="new-listings">New Listings Only</label>
                                </div>
                                <div class="mb-3">
                                    <label for="completion-date" class="form-label fw-bold">Completion Date</label>
                                    <input type="date" class="form-control" id="completion-date">
                                </div>
                                <button class="btn btn-outline-primary w-100">Apply Filters</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('website.partials.footer')
    @include('website.partials.js')

    <script>
        document.querySelector('.search-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const location = document.getElementById('location').value;
            const propertyType = document.getElementById('property-type').value;
            const sizeMin = document.getElementById('size-min').value;
            const sizeMax = document.getElementById('size-max').value;
            const priceRange = document.getElementById('price-range').value;

            const resultsContainer = document.getElementById('property-results');
            const noResults = document.getElementById('no-results');

            // Simulate search results (replace with API call)
            if (location || sizeMin || sizeMax) {
                resultsContainer.classList.remove('d-none');
                noResults.classList.add('d-none');
                // Filter properties based on all parameters
            } else {
                resultsContainer.classList.add('d-none');
                noResults.classList.remove('d-none');
            }
        });

        // Button interactions
        document.querySelectorAll('.btn-outline-success').forEach(btn => {
            btn.addEventListener('click', function() {
                this.classList.toggle('btn-success');
                this.classList.toggle('btn-outline-success');
            });
        });

        document.querySelectorAll('.btn-outline-warning').forEach(btn => {
            btn.addEventListener('click', function() {
                this.classList.toggle('btn-warning');
                this.classList.toggle('btn-outline-warning');
            });
        });

        // Grid/List view toggle (placeholder)
        document.querySelector('.btn-outline-secondary').addEventListener('click', function() {
            this.querySelector('i').classList.toggle('bi-grid-3x3-gap');
            this.querySelector('i').classList.toggle('bi-list');
            // Add logic to switch between grid and list view
        });
    </script>
</body>
</html>
