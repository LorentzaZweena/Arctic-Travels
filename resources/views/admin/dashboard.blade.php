<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Arctic Travels</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="dashboard-wrapper">
    
    <div class="sidebar" id="sidebarMenu">
        <div class="sidebar-header">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-snow2 text-white"></i>
                <span>Arctic Admin</span>
            </div>
            <button class="btn d-lg-none text-white p-0" onclick="toggleSidebar()"><i class="bi bi-x-lg fs-4"></i></button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#"><i class="bi bi-grid-1x2-fill"></i> Profile</a></li>
            <li class="active"><a href="#"><i class="bi bi-building-gear"></i> Manage Resorts</a></li>
            <li><a href="#"><i class="bi bi-person"></i> Users</a></li>
            <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Destinations</a></li>
            <li><a href="#"><i class="bi bi-calendar-check-fill"></i> Bookings</a></li>
            <li><a href="#"><i class="bi bi-chat-left-heart-fill"></i> Reviews</a></li>
            <li><a href="#"><i class="bi bi-envelope-fill"></i> Contacts</a></li>
        </ul>
    </div>

    <div class="main-content">
        
        <div class="topbar">
            <button class="btn btn-outline-secondary d-lg-none" onclick="toggleSidebar()">
                <i class="bi bi-list fs-4"></i>
            </button>

            <div class="search-box">
                <input type="text" placeholder="Search resort...">
            </div>
            
            <div class="d-flex align-items-center gap-2 gap-sm-3">
                <span class="text-muted small d-none d-sm-inline">Hello, <strong>{{ Auth::user()->name }}</strong></span>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-2">
                        <i class="bi bi-box-arrow-right"></i> <span class="d-none d-sm-inline">Log Out</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="container-fluid p-3 p-sm-4">
            
            <div class="alert alert-dismissible fade show border-0 shadow-sm bg-white mb-4 p-3" role="alert" style="border-left: 4px solid var(--primary-theme) !important;">
                <span>👋 Welcome to the premium control panel, {{ Auth::user()->name }}.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="content-card">
                
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
                    <div>
                        <h3 class="fw-bold m-0 text-dark">Resorts List</h3>
                        <p class="text-muted small m-0 mt-1">Manage active winter vacation accommodation data.</p>
                    </div>
                    <div class="d-flex gap-2 w-100 w-sm-auto">
                        <a href="{{ route('admin.resort.create') }}" class="btn btn-primary btn-sm shadow-sm border-0 px-3 py-2 text-white w-100 w-sm-auto" style="background-color: var(--primary-theme); text-decoration: none;">
                            <i class="bi bi-plus-lg me-1"></i> Add new
                        </a>
                        <button class="btn btn-outline-secondary btn-sm bg-white px-3 py-2 text-muted w-100 w-sm-auto">
                            <i class="bi bi-download me-1"></i> Export
                        </button>
                    </div>
                </div>

                <div class="mb-3 text-end text-muted small">
                    Total Resorts: <span class="fw-bold text-dark">{{ count($resorts ?? []) }}</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-hover m-0" style="min-width: 600px;">
                        <thead>
                            <tr>
                                <th width="10%">Photo</th>
                                <th width="30%">Resort Name</th>
                                <th width="20%">Country</th>
                                <th width="20%">Price/Night</th>
                                <th width="10%">Status</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($resorts ?? [] as $resort)
                            <tr>
                                <td><img src="{{ $resort->image }}" class="resort-img-thumb" alt="thumb"></td>
                                <td>
                                    <div class="fw-semibold">{{ $resort->name }}</div>
                                    <span class="text-muted small" style="font-size: 0.75rem;">ID: #00{{ $resort->id }}</span>
                                </td>
                                <td>{{ $resort->country }}</td>
                                <td><span class="fw-bold text-dark">$ {{ number_format($resort->price, 0, ',', '.') }}</span></td>
                                <td><span class="badge-active">Active</span></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.resort.edit', $resort->id) }}" class="btn btn-link p-0 text-secondary me-2" title="Edit">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                    </a>

                                    <form action="{{ route('admin.resort.destroy', $resort->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this resort?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link p-0 text-danger border-0 alignment-baseline" title="Delete">
                                            <i class="bi bi-trash3 fs-5"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Resort data is not yet available.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebarMenu');
        sidebar.classList.toggle('show');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>