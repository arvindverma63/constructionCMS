<!DOCTYPE html>
<html lang="en">
<head>
    @include('Admin.partials.head')
    <style>
        .app {
            background-color: #f0f2f5;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card-header {
            background: linear-gradient(90deg, #007bff, #00c6ff);
            color: white;
            border-bottom: none;
            border-radius: 0.25rem 0.25rem 0 0;
        }

        .table-responsive {
            border: 1px solid #e9ecef;
            border-radius: 0.25rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .btn-custom {
            background: linear-gradient(90deg, #28a745, #2ecc71);
            border: none;
            color: white;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #218838, #27ae60);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.5);
        }

        .invalid-feedback {
            display: block;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .custom-tooltip .tooltip-inner {
            background-color: #2c3e50;
            color: white;
            border-radius: 0.25rem;
        }

        .custom-tooltip .arrow::before {
            border-bottom-color: #2c3e50 !important;
        }

        /* Sidebar Offset and Responsive Adjustments */
        .app-content {
            margin-left: 250px; /* Adjust this value to match your sidebar width */
            transition: margin-left 0.3s;
            padding: 1rem;
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                text-align: center;
            }
            .card-header h4 {
                margin-bottom: 0.5rem;
            }
            .input-group {
                width: 100% !important;
                margin-top: 0.5rem;
            }
            .form-floating {
                margin-bottom: 1rem;
            }
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            .modal-dialog {
                margin: 0.5rem;
            }
            .modal-content {
                margin: 0;
            }
            /* Collapse sidebar on small screens if it's fixed */
            .app-content {
                margin-left: 0;
                padding: 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .row.g-3 > .col-12.col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .table th, .table td {
                font-size: 0.9rem;
                padding: 0.5rem;
            }
            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }
            .pagination .page-item {
                margin: 0.25rem;
            }
        }
    </style>
</head>
<body class="app">
    @include('Admin.partials.header')

    <div class="app-content">
        <div class="container-xl">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show fade-in" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show fade-in" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Add Contractor Form -->
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="text-white mb-0">Add Contractor</h4>
                    <button class="btn btn-info btn-sm text-white mt-2 mt-md-0" data-bs-toggle="modal" data-bs-target="#previewModal">
                        <i class="bi bi-eye"></i> Preview
                    </button>
                </div>
                <div class="card-body bg-white">
                    <form action="{{ route('admin.contractor.add') }}" method="POST" enctype="multipart/form-data" id="addContractorForm" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required>
                                    <label for="name">Name</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" required>
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber" placeholder="Phone Number" required>
                                    <label for="phoneNumber">Phone Number</label>
                                    @error('phoneNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="aadhar" class="form-control @error('aadhar') is-invalid @enderror" id="aadhar" placeholder="Aadhar Number" required>
                                    <label for="aadhar">Aadhar Number</label>
                                    @error('aadhar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="companyName" class="form-control @error('companyName') is-invalid @enderror" id="companyName" placeholder="Company Name">
                                    <label for="companyName">Company Name</label>
                                    @error('companyName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="field" class="form-control @error('field') is-invalid @enderror" id="field" placeholder="Field">
                                    <label for="field">Field</label>
                                    @error('field')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="form-floating">
                                <textarea name="experience" class="form-control @error('experience') is-invalid @enderror" id="experience" placeholder="Experience" style="height: 100px;"></textarea>
                                <label for="experience">Experience</label>
                                @error('experience')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4 d-flex flex-column flex-md-row gap-2">
                            <button type="submit" class="btn btn-primary text-white">
                                <i class="bi bi-plus-circle"></i> Add Contractor
                            </button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contractor List Table -->
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="text-white mb-0 p-3">All Contractors</h4>
                    <div class="input-group w-100 w-md-25 mt-2 mt-md-0">
                        <input type="text" class="form-control" id="searchTable" placeholder="Search...">
                        <button class="btn btn-outline-light" type="button" id="searchBtn">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Field</th>
                                    <th>Experience</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @forelse($contractors as $contractor)
                                    <tr>
                                        <td><input type="checkbox" class="contractorCheckbox" data-id="{{ $contractor->id }}"></td>
                                        <td>{{ $contractor->name }}</td>
                                        <td>{{ $contractor->email }}</td>
                                        <td>{{ $contractor->phoneNumber }}</td>
                                        <td>{{ $contractor->companyName ?? 'N/A' }}</td>
                                        <td>{{ $contractor->field ?? 'N/A' }}</td>
                                        <td>{{ $contractor->experience ?? 'N/A' }}</td>
                                        <td>
                                            @if ($contractor->image)
                                                <img src="{{ asset('storage/' . $contractor->image) }}" width="60" height="60" class="rounded" data-bs-toggle="tooltip" data-bs-title="Click to enlarge" data-bs-custom-class="custom-tooltip">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $contractor->id }}">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $contractor->id }}">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No contractors found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation" class="d-flex justify-content-center mt-3">
                        <ul class="pagination">
                            <li class="page-item {{ $contractors->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $contractors->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $contractors->lastPage(); $i++)
                                <li class="page-item {{ $contractors->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $contractors->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $contractors->currentPage() == $contractors->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $contractors->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    @include('Admin.pages.contractors.edit-delete-modals')
    @include('Admin.partials.js')
    <script src="{{ asset('logicJs/contractor.js') }}"></script>
</body>
</html>
