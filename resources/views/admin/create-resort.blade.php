<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Resort - Arctic Admin</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f2f7;
            overflow-x: hidden;
        }

        :root {
            --primary-theme: #2563eb;
            --sidebar-bg: #2563eb;
            --sidebar-active: #1d4ed8;
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* RESPONSIVE SIDEBAR */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: white;
            transition: all 0.3s ease;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            z-index: 1040;
        }

        .sidebar-header {
            padding: 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            background-color: var(--sidebar-active);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 1rem 0 0 0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 0.85rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .sidebar-menu li a:hover, .sidebar-menu li.active a {
            color: white;
            background-color: var(--sidebar-active);
            border-left: 4px solid #fff;
        }

        /* MAIN CONTENT AREA */
        .main-content {
            flex-grow: 1;
            background-color: #f6f6fb;
            min-width: 0;
        }

        .topbar {
            background-color: white;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
            color: #4a5568;
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            padding: 0.6rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background-color: #f8fafc;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-theme);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            background-color: white;
        }

        /* MEDIA QUERIES UNTUK HP & TABLET */
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -260px; /* Sembunyikan sidebar ke kiri luar layar */
            }
            
            .sidebar.show {
                left: 0; /* Tampilkan sidebar */
            }

            .form-card {
                padding: 1.5rem;
            }
        }
    </style>
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
            <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="bi bi-building-gear"></i> Manage Resorts</a></li>
            <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Destinations</a></li>
            <li><a href="#"><i class="bi bi-calendar-check-fill"></i> Bookings</a></li>
            <li><a href="#"><i class="bi bi-chat-left-heart-fill"></i> Reviews</a></li>
        </ul>
    </div>

    <div class="main-content">
        
        <div class="topbar">
            <button class="btn btn-outline-secondary d-lg-none" onclick="toggleSidebar()">
                <i class="bi bi-list fs-4"></i>
            </button>

            <nav aria-label="breadcrumb" class="d-none d-sm-inline-block">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color: var(--primary-theme);">Resorts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New</li>
                </ol>
            </nav>
            
            <span class="text-muted small">Logged in as <strong>{{ Auth::user()->name }}</strong></span>
        </div>

        <div class="container-fluid p-3 p-sm-4">
            
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    
                    <div class="form-card">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-circle p-2 px-25 border-0"><i class="bi bi-arrow-left fs-5"></i></a>
                            <div>
                                <h3 class="fw-bold m-0 text-dark">Add New Resort</h3>
                                <p class="text-muted small m-0 mt-1">Enter the new resort information into the database.</p>
                            </div>
                        </div>

                        <hr class="mb-4 text-muted opacity-25">

                        <form method="POST" action="{{ route('admin.resort.store') }}">
                            @csrf

                            <div class="row g-3 g-sm-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Resort Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="e.g. Zermatt Luxury Ski Lodge" value="{{ old('name') }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country / Region</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" placeholder="e.g. Switzerland" value="{{ old('country') }}" required>
                                    @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="destination_id" class="form-label">Main Destination Group</label>
                                    <select class="form-select @error('destination_id') is-invalid @enderror" id="destination_id" name="destination_id" required>
                                        <option value="" disabled selected>-- Select Area Destination --</option>
                                        @foreach($destinations as $destination)
                                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('destination_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price per Night (USD)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted">$</span>
                                        <input type="number" class="form-control border-start-0 @error('price') is-invalid @enderror" id="price" name="price" placeholder="1500" value="{{ old('price') }}" required>
                                    </div>
                                    @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="image" class="form-label">Resort Showcase Image URL</label>
                                    <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="https://images.unsplash.com/your-photo-link..." value="{{ old('image') }}" required>
                                    <div class="form-text text-muted small">Enter the image URL from Unsplash or a public CDN.</div>
                                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="description" class="form-label">Resort Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Describe the amenities, highlights, and scenic views of this resort..." required>{{ old('description') }}</textarea>
                                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-column-reverse flex-sm-row justify-content-end gap-2 mt-4 mt-sm-5">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-light border px-4 py-2 text-muted w-100 w-sm-auto">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4 py-2 border-0 text-white shadow-sm w-100 w-sm-auto" style="background-color: var(--primary-theme);">
                                    <i class="bi bi-cloud-arrow-up me-1"></i> Save Resort
                                </button>
                            </div>

                        </form>

                    </div>

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