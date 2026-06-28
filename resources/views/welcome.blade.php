<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Arctic Travels</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body>

<div class="main-wrapper">
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container px-3">

        <a class="navbar-brand brand" href="#">
            <span>A</span>rctic Travels
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">

        <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#destination">Destinations</a></li>
            <li class="nav-item"><a class="nav-link" href="#resort">Resorts</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>

        @auth
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('customer.bookings') }}" class="nav-link fw-medium text-dark me-2">
                    <i class="bi bi-journal-check me-1"></i> My Bookings
                </a>

                <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : '#' }}" class="btn btn-primary rounded-3 px-3">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                </a>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary rounded-3 px-3">Login</a>
        @endauth

        </div>
    </div>
</nav>

<div class="container">


<section class="hero">
    <div class="row align-items-center">
        <div class="col-lg-6">

        <h1>
            Plan the Perfect
            <span>Winter Trip</span>
        </h1>

        <p>
            Easily plan your ideal ski trip from home with the help of professionals. Experience luxury skiing holidays at world-class resorts with exclusive pricing and personalized support.
        </p>

        <a href="#resort" class="btn btn-primary rounded-3 px-3">
            Book Now
        </a>

        <div class="booking-box">

            <div class="row align-items-center">

            <div class="col-md-3">
                <h6>Regions</h6>
                <p class="mb-0">Zermatt</p>
            </div>

            <div class="col-md-3">
                <h6>Lodging</h6>
                <p class="mb-0"> Chalet</p>
            </div>

            <div class="col-md-3">
                <h6>Resorts</h6>
                <p class="mb-0">Matterhorn</p>
            </div>

            <div class="col-md-3">
                <button class="btn btn-main w-100">
                Search
                </button>
            </div>
        </div>
    </div>
</div>

    <div class="col-lg-6">
        <div class="image-grid">

            <img class="tall" src="https://images.unsplash.com/photo-1670792761649-3cff5ab6503c?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

            <img src="https://images.unsplash.com/photo-1498576260462-eefc9d0ce9f7?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

            <img src="https://images.unsplash.com/photo-1645535490445-8b1ed504b70e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cmVzb3J0JTIwd2ludGVyfGVufDB8MXwwfHx8Mg%3D%3D" alt="">

            <img src="https://images.unsplash.com/photo-1517918558653-3a2c5ab393a2?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cmVzb3J0JTIwd2ludGVyfGVufDB8MXwwfHx8Mg%3D%3D" alt="">
            </div>
        </div>
    </div>
</section>

<section class="section" id="destination">

    <h2 class="section-title mb-3">
        Top Destinations
    </h2>

    <p class="section-text mb-5">
        Explore premium ski destinations around the world.
    </p>

    <div class="row text-center">

        <div class="col-lg-2 col-md-4 col-6 mb-4">
            <div class="destination-card">
                <img src="https://images.unsplash.com/photo-1507039102241-5ec61d624406?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8emVybWF0dHxlbnwwfHwwfHx8Mg%3D%3D">
                <h6>Zermatt</h6>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 mb-4">
            <div class="destination-card">
                <img src="https://images.unsplash.com/photo-1577835052410-021601ad3cee?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fG5pc2Vrb3xlbnwwfHwwfHx8Mg%3D%3D">
                <h6>Niseko</h6>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 mb-4">
            <div class="destination-card">
                <img src="https://images.unsplash.com/photo-1599148874821-a3aa38f27ede?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8d2hpc3RsZXJ8ZW58MHx8MHx8fDI%3D">
                <h6>Whistler</h6>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 mb-4">
            <div class="destination-card">
                <img src="https://images.unsplash.com/photo-1558380932-9f0ed72f08b9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Q2hhbW9uaXh8ZW58MHx8MHx8fDI%3D">
                <h6>Chamonix</h6>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-6 mb-4">
            <div class="destination-card">
                <img src="https://images.unsplash.com/photo-1565885004858-c70de2d1af64?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjF8fEFzcGVufGVufDB8fDB8fHwy">
            <h6>Aspen</h6>
        </div>
    </div>

        <div class="col-lg-2 col-md-4 col-6 mb-4">
        <div class="destination-card">
            <img src="https://images.unsplash.com/photo-1700251135922-2b6bba2d5fbd?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fFN0LiUyME1vcml0enxlbnwwfHwwfHx8Mg%3D%3D">
            <h6>St. Moritz</h6>
        </div>
    </div>

</div>

</section>

<section class="pb-5" id="resort">

    <div class="container my-5">
    <h2 class="text-center fw-bold mb-4">Our Luxury Winter Resorts</h2>
    <div class="row g-4">
        
        @forelse($resorts as $resort)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ $resort->image }}" class="card-img-top" alt="{{ $resort->name }}" style="height: 220px; object-fit: cover;">
                    
                    <div class="card-body p-4">
                        <span class="badge bg-primary mb-2">{{ $resort->destination->name ?? 'Uncategorized' }}</span>
                        <h5 class="card-title fw-bold text-dark">{{ $resort->name }}</h5>
                        <p class="text-muted small"><i class="bi bi-geo-alt-fill text-danger"></i> {{ $resort->country }}</p>
                        
                        <p class="card-text text-secondary small">
                            {{ Str::limit($resort->description, 100, '...') }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <span class="text-muted block small">Price/Night</span>
                                <h5 class="fw-bold text-success m-0">$ {{ number_format($resort->price, 0, ',', '.') }}</h5>
                            </div>
                            
                            @auth
                                <button class="btn btn-primary rounded-3 px-3" data-bs-toggle="modal" data-bs-target="#bookModal{{ $resort->id }}">
                                    Book Now
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary rounded-3 px-3">Login to Book</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="bookModal{{ $resort->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow rounded-4">
                        <div class="modal-header bg-light border-0 py-3">
                            <h5 class="modal-title fw-bold">Book {{ $resort->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('resorts.book', $resort->id) }}" method="POST">
                            @csrf
                            <div class="modal-body p-4">
                                <div class="mb-3 text-center">
                                    <span class="text-muted small">Price per Night</span>
                                    <h4 class="fw-bold text-success">$ {{ number_format($resort->price, 0, ',', '.') }}</h4>
                                </div>
                                
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label small fw-medium">Check-In Date</label>
                                        <input type="date" name="check_in" class="form-control" min="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-medium">Check-Out Date</label>
                                        <input type="date" name="check_out" class="form-control" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-medium">Total Guests</label>
                                        <input type="number" name="guests" class="form-control" min="1" max="10" placeholder="1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0 p-4 pt-0">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary px-4">Confirm Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="bi bi-building-exclamation fs-1"></i>
                <p class="mt-2">Maaf, saat ini belum ada resort aktif yang tersedia.</p>
            </div>
        @endforelse

    </div>
</div>

</section>

<section class="section">

    <div class="row align-items-center">

    <div class="col-lg-5">

    <div class="feature-box">
        <h5>Luxury Experiences</h5>
        <p>Exclusive ski vacations designed for travelers seeking premium comfort.</p>
    </div>

    <div class="feature-box">
        <h5>Best Prices</h5>
        <p>Access competitive pricing without sacrificing luxury or quality.</p>
    </div>

    <div class="feature-box">
        <h5>Expert Travel Agents</h5>
        <p>Dedicated professionals help plan every detail of your trip.</p>
    </div>

    </div>

    <div class="col-lg-7">
        <img class="feature-img" src="https://images.unsplash.com/photo-1486140525285-12e658d9ac0f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fHdpbnRlcnxlbnwwfHwwfHx8Mg%3D%3D">
    </div>

    </div>

</section>

<section class="section pt-0">

    <div class="popular-header">

        <h2 class="section-title mb-0">
            Client Reviews
        </h2>

        <div class="slider-controls">
            <button onclick="scrollLeftReviews()">←</button>
            <button onclick="scrollRightReviews()">→</button>
        </div>

    </div>

    <div class="review-slider" id="reviewSlider">
        <div class="testimonial-card">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=1000">

            <h4>"The easiest ski vacation we've ever planned."</h4>

            <p>
                Arctic Travels organized everything from accommodation to lift passes.
                The experience felt completely personalized and luxurious.
            </p>

            <strong>Michael Anderson</strong>

            <div>⭐⭐⭐⭐⭐</div>
        </div>

        <div class="testimonial-card">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=1000">

            <h4>"Amazing service and support."</h4>

            <p>
                Everything was arranged perfectly. We only had to enjoy the trip.
            </p>

            <strong>Sarah Wilson</strong>

            <div>⭐⭐⭐⭐⭐</div>
        </div>

        <div class="testimonial-card">
            <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=1000">

            <h4>"Best ski holiday ever."</h4>

            <p>
                Great resorts, excellent pricing, and very responsive agents.
            </p>

            <strong>David Brown</strong>

            <div>⭐⭐⭐⭐⭐</div>
        </div>

    </div>

</section>
<section class="section" id="contact">

    <div class="text-center mb-5">
        <h2 class="section-title">
            Connect With Our Team
        </h2>

        <p class="section-text">
            Have questions about destinations, resorts, or booking packages?
            Reach out and we'll help plan your perfect winter vacation.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">

            <div class="contact-form-box">

                <h3 class="mb-4">
                    Get In Touch
                </h3>

                <form>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Your Name">
                        </div>

                        <div class="col-md-6 mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Your Email">
                        </div>
                    </div>

                    <input
                        type="text"
                        class="form-control mb-3"
                        placeholder="Subject">

                    <textarea
                        rows="6"
                        class="form-control mb-3"
                        placeholder="Write your message"></textarea>

                    <button class="btn btn-main">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

        <div class="col-lg-6">

            <h3 class="mb-4">
                Contact Details
            </h3>

            <p class="section-text mb-4">
                Our travel specialists are available to help you choose
                the best ski resorts and winter experiences.
            </p>

            <div class="contact-grid">

                <div class="contact-card">
                    <h6>📍 Address</h6>
                    <p>United Kingdom, London</p>
                </div>

                <div class="contact-card">
                    <h6>📞 Phone</h6>
                    <p>+1 812 3456 7890</p>
                </div>

                <div class="contact-card">
                    <h6>🕒 Availability</h6>
                    <p>09:00 AM - 05:00 PM</p>
                </div>

                <div class="contact-card">
                    <h6>✉️ Email</h6>
                    <p>hello@arctictravels.com</p>
                </div>

            </div>

        </div>

    </div>

</section>
<section class="section pt-0">

    <div class="text-center mb-5">

        <h2 class="section-title">
            Frequently Asked Questions
        </h2>

        <p class="section-text">
            Find answers to the most common questions about our ski vacations.
        </p>

    </div>

    <div class="row align-items-center">

        <div class="col-lg-6">

            <div class="accordion" id="faqAccordion">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">
                            How can I book a resort?
                        </button>
                    </h2>

                    <div id="faq1"
                         class="accordion-collapse collapse show"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body">
                            Simply browse destinations, choose your preferred
                            resort, and contact our team.
                        </div>

                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">
                            Are flights included?
                        </button>
                    </h2>

                    <div id="faq2"
                         class="accordion-collapse collapse"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body">
                            Flights can be added as part of a custom package.
                        </div>

                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button
                            class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">
                            Do you offer family packages?
                        </button>
                    </h2>

                    <div id="faq3"
                         class="accordion-collapse collapse"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body">
                            Yes, we provide family-friendly resorts and
                            customized holiday packages.
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-6">
            <img
                class="faq-image" src="https://images.unsplash.com/photo-1615890932417-89da415105d2?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y3VzdG9tZXIlMjBzZXJ2aWNlfGVufDB8MXwwfHx8MA%3D%3D">

        </div>

    </div>

</section>

</div>
<footer class="rounded-0">

    <div class="container rounded-0">

        <div class="row">

        <div class="col-lg-6">
            <h3>Arctic Travels</h3>
            <p>Premium Ski & Snowboarding Experiences Worldwide.</p>
        </div>

        <div class="col-lg-6 text-lg-end">
            <a href="/">Dashboard</a> |
            <a href="#resort">Resorts</a> |
            <a href="#">Lodging</a> |
            <a href="#">Contact</a>
        </div>

        </div>

        <hr>

        <div class="text-center">
            © 2026 Arctic Travels. All Rights Reserved.
        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

function scrollLeftResorts() {
    document.getElementById('resortSlider').scrollBy({
        left: -400,
        behavior: 'smooth'
    });
}

function scrollRightResorts() {
    document.getElementById('resortSlider').scrollBy({
        left: 400,
        behavior: 'smooth'
    });
}

function scrollLeftReviews() {
    document.getElementById('reviewSlider').scrollBy({
        left: -500,
        behavior: 'smooth'
    });
}

function scrollRightReviews() {
    document.getElementById('reviewSlider').scrollBy({
        left: 500,
        behavior: 'smooth'
    });
}

</script>

</body>
</html>