<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GoCamps - Outdoor Gear Rental</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/fontawesome.min.css">
    <style>
        footer {
            margin-top: auto;
        }

        .brand-carousel {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 4rem 0;
        }

        .brand-item {
            text-align: center;
            padding: 1.5rem;
            transition: transform 0.3s;
        }

        .brand-item:hover {
            transform: translateY(-5px);
        }

        .brand-item img {
            max-height: 100px;
            width: auto;
            object-fit: contain;
            margin-bottom: 1rem;
            filter: grayscale(30%);
            transition: filter 0.3s;
        }

        .brand-item:hover img {
            filter: grayscale(0%);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 100% 100%;
            width: 2.5rem;
            height: 2.5rem;
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%230d6efd' viewBox='0 0 8 8'%3E%3Cpath d='M5.5 0L4.09 1.41 6.67 4 4.09 6.59 5.5 8l4-4-4-4z' transform='rotate(180 4 4)'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%230d6efd' viewBox='0 0 8 8'%3E%3Cpath d='M5.5 0L4.09 1.41 6.67 4 4.09 6.59 5.5 8l4-4-4-4z'/%3E%3C/svg%3E");
        }

        /* Hero Section Enhancements */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 6rem 0;
            position: relative;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }

        /* Features Section Enhancements */
        .feature-card {
            transition: all 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0d6efd;
        }

        /* Testimonial Enhancements */
        .testimonial-card {
            border-radius: 10px;
            transition: all 0.3s;
            border: none;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Footer Enhancements */
        footer {
            background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);
        }

        .footer-link {
            transition: all 0.2s;
            display: inline-block;
        }

        .footer-link:hover {
            color: #fff !important;
            transform: translateX(5px);
            text-decoration: underline !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Section Headings */
        .section-heading {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .section-heading:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: #0d6efd;
            bottom: -10px;
            left: 25%;
            border-radius: 3px;
        }

        /* Navbar Enhancements */
        .navbar {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
            background: linear-gradient(135deg, #0d6efd 0%, #084298 100%) !important;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: white;
        }

        .navbar-nav .nav-link:hover:after,
        .navbar-nav .nav-link.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 15%;
            width: 70%;
            height: 2px;
            background-color: white;
            transform: scaleX(1);
            transition: transform 0.3s ease;
        }

        .navbar-nav .nav-link:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 15%;
            width: 70%;
            height: 2px;
            background-color: white;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            padding-left: 1.75rem;
        }

        .user-avatar {
            transition: all 0.3s;
        }

        .category-card {
            transition: all 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.15);
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .category-card .card-body {
            padding: 2rem 1rem;
        }

        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
        }

        /* Rest of your existing styles... */
        .brand-carousel {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 4rem 0;
        }
    </style>
</head>

<body class="bg-white text-dark">
    <!-- Enhanced Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href{{ route('user.index') }}">
                <i class="fa fa-campground me-2"></i>GoCamps
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('katalog.index') }}">Katalog Sewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak Kami</a>
                    </li>
                </ul>

                @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="rounded-full overflow-hidden me-2 border border-purple-200 shadow-sm"
                                style="width: 40px; height: 40px;">
                                <img src="/images/users.jpg" alt="User" class="object-cover w-100 h-100">
                            </div>
                            <span class="text-gray-800 fw-semibold">{{ auth()->user()->name }}</span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user-circle me-2"></i>My Profile
                                </a>
                            </li>

                            <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="fas fa-sign-out-alt me-2"></i>{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">Premium Outdoor Gear Rental
                    </h1>
                    <p class="lead mb-5 fs-4">
                        Rent top-quality tents, backpacks, shoes, sleeping bags, cooking supplies, and more for any
                        trip.
                    </p>
                    <a href="{{ route('katalog.index') }}" class="btn btn-primary btn-lg px-4 py-3">BOOK NOW <i
                            class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary section-heading">Why Choose GoCamps?</h2>
                <p class="text-muted">We provide the best outdoor experience with our premium gear</p>
            </div>
            <div class="row g-4">
                @php
                    $features = [
                        [
                            'icon' => 'fa-clock',
                            'title' => '24/7 Online Booking',
                            'desc' => 'Booking kapanpun tanpa harus menunggu respon.',
                        ],
                        [
                            'icon' => 'fa-credit-card',
                            'title' => 'Flexible Payment',
                            'desc' => 'Transfer ke bank atau QRIS dari e-wallet apapun.',
                        ],
                        [
                            'icon' => 'fa-heart',
                            'title' => 'Pick Your Gear',
                            'desc' => 'Pilih gear sesuai gaya dan kebutuhanmu.',
                        ],
                        [
                            'icon' => 'fa-soap',
                            'title' => 'Clean and Fragrant',
                            'desc' => 'Barang selalu bersih, wangi, dan siap pakai.',
                        ],
                        [
                            'icon' => 'fa-calendar-check',
                            'title' => 'Real Time Availability',
                            'desc' => 'Cek ketersediaan barang secara langsung.',
                        ],
                        [
                            'icon' => 'fa-gem',
                            'title' => 'Points & Rewards',
                            'desc' => 'Kumpulkan poin, dapatkan diskon seru!',
                        ],
                    ];
                @endphp

                @foreach ($features as $feature)
                    <div class="col-md-4">
                        <div class="card feature-card h-100 p-4">
                            <div class="card-body text-center">
                                <div class="feature-icon">
                                    <i class="fas {{ $feature['icon'] }}"></i>
                                </div>
                                <h5 class="card-title fw-semibold mb-3">{{ $feature['title'] }}</h5>
                                <p class="card-text text-muted">{{ $feature['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Brands Carousel Section -->
    <section class="brand-carousel">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold section-heading">OUR PREMIUM BRANDS</h2>
            <div id="brandsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-6 brand-item">
                                <img src="{{ asset('images/arei.png') }}" alt="AREI" class="img-fluid">

                            </div>
                            <div class="col-md-3 col-6 brand-item">
                                <img src="{{ asset('images/consina.png') }}" alt="Consina" class="img-fluid">

                            </div>
                            <div class="col-md-3 col-6 brand-item">
                                <img src="{{ asset('images/aerostreet.png') }}" alt="Aerostreet" class="img-fluid">

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-6 brand-item">
                                <img src="{{ asset('images/osprey2.png') }}" alt="Osprey" class="img-fluid">

                            </div>
                            <div class="col-md-3 col-6 brand-item">
                                <img src="{{ asset('images/antarestar.png') }}" alt="Antarestar" class="img-fluid">

                            </div>
                            <div class="col-md-3 col-6 brand-item">
                                <img src="{{ asset('images/bigarmour.jpeg') }}" alt="Big Armour" class="img-fluid">

                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#brandsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#brandsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p class="text-center mt-4 text-muted">dan masih banyak lagi...</p>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="fw-bold text-primary text-center mb-5 section-heading">Our Product Categories</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4">
                        <div class="col-md-4 col-6">
                            <div class="card category-card h-100 text-center p-4">
                                <div class="card-body">
                                    <i class="fas fa-utensils fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title fw-bold">Cooking Set</h5>
                                </div>                                
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="card category-card h-100 text-center p-4">
                                <div class="card-body">
                                    <i class="fas fa-campground fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title fw-bold">Camping</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="card category-card h-100 text-center p-4">
                                <div class="card-body">
                                    <i class="fas fa-suitcase-rolling fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title fw-bold">Sleeping Bag</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="card category-card h-100 text-center p-4">
                                <div class="card-body">
                                    <i class="fas fa-bag-shopping fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title fw-bold">Backpack</h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-6">
                            <div class="card category-card h-100 text-center p-4">
                                <div class="card-body">
                                    <i class="fas fa-hiking fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title fw-bold">Trekking Pole</h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-6">
                            <div class="card category-card h-100 text-center p-4">
                                <div class="card-body">
                                    <i class="fas fa-shoe-prints fa-3x mb-3 text-primary"></i>
                                    <h5 class="card-title fw-bold">Footwear</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps Embed Section -->
        <section class="py-5 bg-white">
            <div class="container">
                <h2 class="fw-bold text-primary text-center mb-5 section-heading">Our Location</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!3m2!1sid!2sid!4v1745226684804!5m2!1sid!2sid!6m8!1m7!1sIXKmu0FkWIbbC04jalqXig!2m2!1d-8.207642513105458!2d111.0972355173959!3f40.62509045281206!4f2.9066054989998094!5f0.7820865974627469"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="text-center mt-4">
                            <a href="https://maps.app.goo.gl/7e7CHJSrW83bGe5R7" target="_blank"
                                class="btn btn-outline-primary">
                                <i class="fas fa-map-marker-alt me-2"></i>Open in Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3"><i class="fa fa-campground me-2"></i>GoCamps</h5>
                    <p class="mb-4">Premium Outdoor Gear Rental Specialist</p>
                    <p class="mb-1 fw-semibold">Ikuti Media Sosial Kami:</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i
                                class="fab fa-tiktok"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Tautan Penting</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('terms-of-use') }}"
                                class="text-white text-decoration-none footer-link">Ketentuan Penggunaan</a></li>
                        <li class="mb-2"><a href="{{ route('app-privacy') }}"
                                class="text-white text-decoration-none footer-link">Kebijakan Privasi Aplikasi</a>
                        </li>
                        <li class="mb-2"><a href="{{ route('privacy-policy') }}"
                                class="text-white text-decoration-none footer-link">Kebijakan Privasi Website</a>
                        </li>
                        <li class="mb-2"><a href="{{ route('terms-conditions') }}"
                                class="text-white text-decoration-none footer-link">Syarat dan Ketentuan Sewa</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Basecamp Nusa</h6>
                    <p class="mb-3"><i class="fas fa-map-marker-alt me-2"></i>Panjang Jiwo, Tenggilis Mejoyo,
                        Surabaya, Indonesia, 60299</p>
                    <h6 class="fw-bold mb-3">Jam Operasional</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="far fa-clock me-2"></i><strong>Sabtu –
                                Kamis</strong><br>10.00 — 22.00 WIB</li>
                        <li class="mb-2"><i class="far fa-clock me-2"></i><strong>Jumat</strong><br>13.00 —
                            22.00 WIB</li>
                        <li class="mb-0"><i class="fas fa-info-circle me-2"></i>Istirahat 15 Menit setiap Waktu
                            Shalat</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Go Camp Outdoor</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('tentang-kami') }}"
                                class="text-white text-decoration-none footer-link"><i
                                    class="fas fa-info-circle me-2"></i>Tentang Kami</a></li>
                        <li class="mb-2"><a href="{{ route('kontak') }}"
                                class="text-white text-decoration-none footer-link"><i
                                    class="fas fa-envelope me-2"></i>Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center small pt-3">
                <p class="mb-0">Go Camp Outdoor – Sewa Alat Camping dan Hiking</p>
                <p>© 2025 All rights reserved</p>
            </div>
        </div>
    </footer>
</body>

</html>
