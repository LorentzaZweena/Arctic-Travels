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
    
    <div class="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-snow2 text-white"></i>
            <span>Arctic Admin</span>
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
            <div class="search-box">
                <input type="text" placeholder="Search resort...">
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted small">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-2">
                        <i class="bi bi-box-arrow-right"></i> Log Out
                    </button>
                </form>
            </div>
        </div>

        <div class="container-fluid p-4">
            
            <div class="alert alert-dismissible fade show border-0 shadow-sm bg-white mb-4 p-3" role="alert" style="border-left: 4px solid var(--primary-theme) !important;">
                <span>👋 Selamat datang di kontrol panel premium, <strong>Super Admin</strong>. Semua sistem berjalan optimal.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="content-card">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold m-0 text-dark">Resorts List</h3>
                        <p class="text-muted small m-0 mt-1">Kelola data akomodasi liburan musim dingin aktif.</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary shadow-sm border-0 px-3 py-2 text-white" style="background-color: var(--primary-theme);">
                            <i class="bi bi-plus-lg me-1"></i> Add new resort
                        </button>
                        <button class="btn btn-outline-secondary bg-white px-3 py-2 text-muted">
                            <i class="bi bi-download me-1"></i> Export (Excel)
                        </button>
                    </div>
                </div>

                <div class="mb-3 text-end text-muted small">
                    Total Resorts: <span class="fw-bold text-dark">{{ count($resorts ?? []) }}</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom table-hover m-0">
                        <thead>
                            <tr>
                                <th width="8%">Photo</th>
                                <th width="25%">Resort Name</th>
                                <th width="15%">Country</th>
                                <th width="20%">Price/Night</th>
                                <th width="12%">Status</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($resorts ?? [] as $resort)
                            <tr>
                                <td>
                                    <img src="{{ $resort->image }}" class="resort-img-thumb" alt="thumb">
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $resort->name }}</div>
                                    <span class="text-muted small" style="font-size: 0.75rem;">ID: #00{{ $resort->id }}</span>
                                </td>
                                <td>{{ $resort->country }}</td>
                                <td>
                                    <span class="fw-bold text-dark">Rp {{ number_format($resort->price, 0, ',', '.') }}</span>
                                </td>
                                <td>
                                    <span class="badge-active">Active</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn-action" title="Edit"><i class="bi bi-pencil-square fs-5"></i></button>
                                    <button class="btn-action text-danger" title="Delete"><i class="bi bi-trash3 fs-5"></i></button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Data resort belum tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>