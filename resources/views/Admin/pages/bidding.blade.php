<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.partials.head')
    <style>
        .bid-form { max-width: 600px; margin: 0 auto 20px; }
        .bid-form .form-group { margin-bottom: 15px; }
    </style>
</head>

<body class="app">
    @include('Admin.partials.header')

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Bidding Projects</h1>

                <!-- Add Project Form -->
                <div class="app-card shadow-sm mb-4 bid-form">
                    <div class="app-card-header p-3">
                        <h4 class="app-card-title text-center">Add Project for Bidding</h4>
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3">
                        <form id="biddingForm" onsubmit="addProject(event)">
                            <div class="form-group">
                                <label for="projectName">Project Name</label>
                                <input type="text" class="form-control" id="projectName" placeholder="Enter project name" required>
                            </div>
                            <div class="form-group">
                                <label for="minBudget">Minimum Budget (₹)</label>
                                <input type="number" class="form-control" id="minBudget" placeholder="e.g., 1000000" required>
                            </div>
                            <div class="form-group">
                                <label for="maxBudget">Maximum Budget (₹)</label>
                                <input type="number" class="form-control" id="maxBudget" placeholder="e.g., 1500000" required>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Bidding Deadline</label>
                                <input type="date" class="form-control" id="deadline" required>
                            </div>
                            <div class="form-group">
                                <label for="requirements">Requirements</label>
                                <textarea class="form-control" id="requirements" rows="3" placeholder="e.g., Must have 5+ years experience, heavy machinery required" required></textarea>
                            </div>
                            <button type="submit" class="btn app-btn-primary w-100">Add Project</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->

                <!-- Bidding Results -->
                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h4 class="app-card-title">Bidding Results</h4>
                            </div><!--//col-->
                            <div class="col-auto">
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Search by project or contractor..." id="searchInput" style="max-width: 200px;">
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
                                    <!-- Options populated dynamically -->
                                </select>
                            </div><!--//col-->
                            <div class="col-auto">
                                <label for="statusFilter" class="me-2">Filter by Status:</label>
                                <select id="statusFilter" class="form-select" style="width: auto; display: inline-block;">
                                    <option value="">All Statuses</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Awarded">Awarded</option>
                                </select>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="biddingTable">
                                <thead>
                                    <tr>
                                        <th class="cell">Project Name</th>
                                        <th class="cell">Contractor</th>
                                        <th class="cell">Bid Amount (₹)</th>
                                        <th class="cell">Deadline</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell" data-project="Highway Extension">Highway Extension</td>
                                        <td class="cell" data-contractor="ABC Construction">ABC Construction</td>
                                        <td class="cell">₹14,50,000</td>
                                        <td class="cell">2025-04-10</td>
                                        <td class="cell" data-status="Open"><span class="badge bg-warning">Open</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View Details"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Award Bid" onclick="awardBid(this)"><i class="fas fa-trophy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Highway Extension">Highway Extension</td>
                                        <td class="cell" data-contractor="XYZ Builders">XYZ Builders</td>
                                        <td class="cell">₹13,80,000</td>
                                        <td class="cell">2025-04-10</td>
                                        <td class="cell" data-status="Open"><span class="badge bg-warning">Open</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary me-1" title="View Details"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn-sm app-btn-secondary" title="Award Bid" onclick="awardBid(this)"><i class="fas fa-trophy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Office Tower">Office Tower</td>
                                        <td class="cell" data-contractor="BuildTech Inc">BuildTech Inc</td>
                                        <td class="cell">₹22,00,000</td>
                                        <td class="cell">2025-03-30</td>
                                        <td class="cell" data-status="Closed"><span class="badge bg-danger">Closed</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="View Details"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell" data-project="Warehouse Renovation">Warehouse Renovation</td>
                                        <td class="cell" data-contractor="Prime Contractors">Prime Contractors</td>
                                        <td class="cell">₹9,75,000</td>
                                        <td class="cell">2025-03-25</td>
                                        <td class="cell" data-status="Awarded"><span class="badge bg-success">Awarded</span></td>
                                        <td class="cell">
                                            <a href="#" class="btn-sm app-btn-secondary" title="View Details"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <small>Showing 4 of 10 bids</small>
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
        // Add Project to Bidding Table
        function addProject(event) {
            event.preventDefault();
            const projectName = document.getElementById('projectName').value;
            const minBudget = document.getElementById('minBudget').value;
            const maxBudget = document.getElementById('maxBudget').value;
            const deadline = document.getElementById('deadline').value;
            const requirements = document.getElementById('requirements').value;

            // Add to project filter dropdown
            const projectFilter = document.getElementById('projectFilter');
            if (!Array.from(projectFilter.options).some(opt => opt.value === projectName)) {
                const option = document.createElement('option');
                option.value = projectName;
                option.textContent = projectName;
                projectFilter.appendChild(option);
            }

            // Placeholder: Normally, this would send data to a backend and await bids
            alert(`Project "${projectName}" added for bidding!\nMin Budget: ₹${minBudget}\nMax Budget: ₹${maxBudget}\nDeadline: ${deadline}\nRequirements: ${requirements}`);
            document.getElementById('biddingForm').reset();
        }

        // Search Functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#biddingTable tbody tr');
            rows.forEach(row => {
                const project = row.querySelector('td[data-project]').getAttribute('data-project').toLowerCase();
                const contractor = row.querySelector('td[data-contractor]').getAttribute('data-contractor').toLowerCase();
                row.style.display = project.includes(searchValue) || contractor.includes(searchValue) ? '' : 'none';
            });
        });

        // Filter Functionality
        function applyFilters() {
            const projectFilter = document.getElementById('projectFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;
            const rows = document.querySelectorAll('#biddingTable tbody tr');

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

        // Award Bid
        function awardBid(button) {
            const row = button.closest('tr');
            const statusCell = row.querySelector('td[data-status]');
            const project = row.querySelector('td[data-project]').textContent;
            const contractor = row.querySelector('td[data-contractor]').textContent;

            // Update status to "Awarded" for this bid
            statusCell.setAttribute('data-status', 'Awarded');
            statusCell.innerHTML = '<span class="badge bg-success">Awarded</span>';
            button.remove(); // Remove the "Award Bid" button

            // Close bidding for all other bids on the same project
            const rows = document.querySelectorAll('#biddingTable tbody tr');
            rows.forEach(otherRow => {
                if (otherRow !== row && otherRow.querySelector('td[data-project]').textContent === project) {
                    const otherStatusCell = otherRow.querySelector('td[data-status]');
                    if (otherStatusCell.getAttribute('data-status') === 'Open') {
                        otherStatusCell.setAttribute('data-status', 'Closed');
                        otherStatusCell.innerHTML = '<span class="badge bg-danger">Closed</span>';
                        const awardButton = otherRow.querySelector('a[title="Award Bid"]');
                        if (awardButton) awardButton.remove();
                    }
                }
            });

            alert(`Bid awarded to ${contractor} for ${project}!`);
        }
    </script>
</body>

</html>
