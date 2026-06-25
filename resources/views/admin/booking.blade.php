<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Arctic Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/booking-admin.css') }}">
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
            <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-building-gear"></i> Manage Resorts</a></li>
            <li><a href="#"><i class="bi bi-geo-alt-fill"></i> Destinations</a></li>
            <li class="active"><a href="{{ route('admin.bookings.index') }}"><i class="bi bi-calendar-check-fill"></i> Bookings</a></li>
            <li><a href="#"><i class="bi bi-chat-left-heart-fill"></i> Reviews</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="topbar">
            <button class="btn btn-outline-secondary d-lg-none" onclick="toggleSidebar()"><i class="bi bi-list fs-4"></i></button>
            <span class="text-muted small">Logged in as <strong>{{ Auth::user()->name }}</strong></span>
        </div>

        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold m-0 text-dark">Manage Bookings</h3>
                    <p class="text-muted small m-0 mt-1">Confirm or cancel a customer's resort admission ticket order.</p>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Customer</th>
                                <th>Resort</th>
                                <th>Check In / Out</th>
                                <th>Guests</th>
                                <th>Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td>
                                        <strong class="d-block">{{ $booking->user->name }}</strong>
                                        <span class="text-muted small">{{ $booking->user->email }}</span>
                                    </td>
                                    <td><span class="fw-medium">{{ $booking->resort->name }}</span></td>
                                    <td>
                                        <span class="badge bg-light text-dark border">{{ $booking->check_in }}</span>
                                        <i class="bi bi-arrow-right mx-1 text-muted"></i>
                                        <span class="badge bg-light text-dark border">{{ $booking->check_out }}</span>
                                    </td>
                                    <td>{{ $booking->guest_count }} Guest(s)</td>
                                    <td class="fw-bold text-success">$ {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        @if($booking->status === 'pending')
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Pending</span>
                                        @elseif($booking->status === 'approved')
                                            <span class="badge bg-success text-white px-3 py-2 rounded-pill">Approved</span>
                                        @else
                                            <span class="badge bg-danger text-white px-3 py-2 rounded-pill">Canceled</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($booking->status === 'pending')
                                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success me-1"><i class="bi bi-check-circle"></i> Approve</button>
                                            </form>
                                            
                                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="status" value="canceled">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Batalkan pesanan ini?')"><i class="bi bi-x-circle"></i> Cancel</button>
                                            </form>
                                        @else
                                            <span class="text-muted small">- Done -</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada riwayat booking yang masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script> function toggleSidebar() { document.getElementById('sidebarMenu').classList.toggle('show'); } </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>