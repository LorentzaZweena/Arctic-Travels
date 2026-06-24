<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resort - Arctic Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/edit-resort-admin.css') }}">
</head>
<body>

<div class="dashboard-wrapper">
    <div class="sidebar" id="sidebarMenu">
        <div class="sidebar-header">
            <div class="d-flex align-items-center gap-2"><i class="bi bi-snow2 text-white"></i><span>Arctic Admin</span></div>
            <button class="btn d-lg-none text-white p-0" onclick="toggleSidebar()"><i class="bi bi-x-lg fs-4"></i></button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#"><i class="bi bi-grid-1x2-fill"></i> Profile</a></li>
            <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-building-gear"></i> Manage Resorts</a></li>
            <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Destinations</a></li>
            <li><a href="#"><i class="bi bi-calendar-check-fill"></i> Bookings</a></li>
            <li><a href="#"><i class="bi bi-chat-left-heart-fill"></i> Reviews</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar">
            <button class="btn btn-outline-secondary d-lg-none" onclick="toggleSidebar()"><i class="bi bi-list fs-4"></i></button>
            <span class="text-muted small">Logged in as <strong>{{ Auth::user()->name }}</strong></span>
        </div>

        <div class="container-fluid p-3 p-sm-4">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="form-card">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-circle p-2 border-0"><i class="bi bi-arrow-left fs-5"></i></a>
                            <div>
                                <h3 class="fw-bold m-0 text-dark">Edit Resort</h3>
                                <p class="text-muted small m-0 mt-1">Ubah rincian akomodasi resort yang sudah terdaftar.</p>
                            </div>
                        </div>
                        <hr class="mb-4 text-muted opacity-25">

                        <form method="POST" action="{{ route('admin.resort.update', $resort->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row g-3 g-sm-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Resort Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $resort->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country / Region</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $resort->country) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="destination_id" class="form-label">Main Destination Group</label>
                                    <select class="form-select" id="destination_id" name="destination_id" required>
                                        @foreach($destinations as $destination)
                                            <option value="{{ $destination->id }}" {{ $resort->destination_id == $destination->id ? 'selected' : '' }}>{{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price per Night (USD)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted">$</span>
                                        <input type="number" class="form-control border-start-0" id="price" name="price" value="{{ old('price', $resort->price) }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="image" class="form-label">Resort Showcase Image URL</label>
                                    <input type="url" class="form-control" id="image" name="image" value="{{ old('image', $resort->image) }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Resort Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $resort->description) }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex flex-column-reverse flex-sm-row justify-content-end gap-2 mt-4 mt-sm-5">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-light border px-4 py-2 text-muted w-100 w-sm-auto">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4 py-2 border-0 text-white shadow-sm w-100 w-sm-auto" style="background-color: var(--primary-theme);">
                                    <i class="bi bi-check-lg me-1"></i> Update Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script> function toggleSidebar() { document.getElementById('sidebarMenu').classList.toggle('show'); } </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>