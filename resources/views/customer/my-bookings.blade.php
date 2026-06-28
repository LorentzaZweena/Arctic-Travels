<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - Arctic Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .navbar-brand { font-weight: 700; color: #2563eb; }
        .card-history { background: white; border-radius: 16px; border: none; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('landing') }}">
            <i class="bi bi-snow2 text-primary"></i> <span>Arctic Travels</span>
        </a>
        <a href="{{ route('landing') }}" class="btn btn-light btn-sm rounded-3"><i class="bi bi-arrow-left"></i> Back to Home</a>
    </div>
</nav>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="bg-primary text-white rounded-3 p-3 d-inline-flex">
                    <i class="bi bi-suitcase-lg fs-3"></i>
                </div>
                <div>
                    <h3 class="fw-bold m-0">Your Order History</h3>
                    <p class="text-muted m-0 small">Monitor the status of your luxury winter resort bookings here.</p>
                </div>
            </div>

            <div class="card card-history p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary small">
                            <tr>
                                <th>Resort</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Guests</th>
                                <th>Total Cost</th>
                                <th class="text-center">Transaction Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td>
                                        <span class="fw-bold text-dark d-block">{{ $booking->resort->name }}</span>
                                        <span class="text-muted small"><i class="bi bi-geo-alt"></i> {{ $booking->resort->country }}</span>
                                    </td>
                                    <td><span class="badge bg-light text-dark border p-2">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</span></td>
                                    <td><span class="badge bg-light text-dark border p-2">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</span></td>
                                    <td><span class="fw-medium">{{ $booking->guest_count }} guest(s)</span></td>
                                    <td><span class="fw-bold text-success fs-5">$ {{ number_format($booking->total_price, 0, ',', '.') }}</span></td>
                                    <td class="text-center">
                                        @if($booking->status === 'pending')
                                            <span class="badge bg-warning-subtle text-warning-emphasis px-3 py-2 rounded-pill small"><i class="bi bi-clock-history me-1"></i> Awaiting Confirmation</span>
                                        @elseif($booking->status === 'approved')
                                            <span class="badge bg-success-subtle text-success-emphasis px-3 py-2 rounded-pill small"><i class="bi bi-check-circle me-1"></i> Approved by Admin</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger-emphasis px-3 py-2 rounded-pill small"><i class="bi bi-x-circle me-1"></i> Cancelled</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-calendar-x fs-1 text-black-50 d-block mb-2"></i>
                                        You haven't booked any resorts yet. Let's find your dream resort now!
                                    </td>
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