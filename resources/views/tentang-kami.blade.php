<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - GoCamps</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/fontawesome.min.css">
    <style>
        /* Reuse your existing styles */
        footer {
            margin-top: auto;
        }

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

        /* About Us specific styles */
        .about-section {
            padding: 5rem 0;
        }

        .mission-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .mission-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.15);
        }

        .team-member {
            text-align: center;
            margin-bottom: 2rem;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #0d6efd;
            margin-bottom: 1rem;
            transition: all 0.3s;
        }

        .team-member:hover img {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .timeline {
            position: relative;
            padding-left: 50px;
            margin: 3rem 0;
        }

        .timeline:before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: #0d6efd;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2.5rem;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: -50px;
            top: 5px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: white;
            border: 4px solid #0d6efd;
        }

        .stats-item {
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            background: rgba(13, 110, 253, 0.1);
            transition: all 0.3s;
        }

        .stats-item:hover {
            transform: translateY(-5px);
            background: rgba(13, 110, 253, 0.2);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 0.5rem;
        }

        /* Reuse your navbar and footer styles from the home page */
        .navbar {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
            background: linear-gradient(135deg, #0d6efd 0%, #084298 100%) !important;
        }

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

        footer {
            background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);
        }
    </style>
</head>

<body class="bg-white text-dark">
    <!-- Navbar (same as home page) -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('user.index') }}">
                <i class="fa fa-campground me-2"></i>GoCamps
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('katalog.index') }}">Katalog Sewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak Kami</a>
                    </li>
                </ul>

                @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/img/user.jpg" alt="User" class="rounded-circle me-2 user-avatar"
                                width="40" height="40">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i>My
                                    Profile</a></li>
                            <li>
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
                    <h1 class="display-4 fw-bold mb-4">Tentang GoCamps</h1>
                    <p class="lead mb-5 fs-4">
                        Menyediakan peralatan outdoor berkualitas untuk petualangan tak terlupakan Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold text-primary section-heading">Siapa Kami</h2>
                    <p class="lead">GoCamps adalah penyedia layanan sewa peralatan outdoor terkemuka di Indonesia.</p>
                    <p>Didirikan pada tahun 2018, kami berkomitmen untuk menyediakan peralatan camping dan hiking berkualitas tinggi dengan harga terjangkau. Dengan pengalaman lebih dari 5 tahun di industri outdoor, kami memahami betul kebutuhan para petualang.</p>
                    <p>Kami percaya bahwa petualangan luar ruangan seharusnya dapat dinikmati oleh semua orang, tanpa harus mengeluarkan biaya besar untuk membeli peralatan sendiri.</p>
                    <a href="{{ route('katalog.index') }}" class="btn btn-primary mt-3">Lihat Katalog Kami</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Our Team" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary section-heading">Visi & Misi Kami</h2>
                <p class="text-muted">Landasan yang memandu setiap langkah kami</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card mission-card h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-binoculars fa-3x text-primary"></i>
                            </div>
                            <h3 class="text-center fw-bold mb-3">Visi</h3>
                            <p class="text-center">Menjadi platform penyewaan peralatan outdoor terdepan di Indonesia yang memungkinkan semua orang untuk menikmati petualangan alam bebas dengan peralatan berkualitas dan layanan terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mission-card h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <i class="fas fa-bullseye fa-3x text-primary"></i>
                            </div>
                            <h3 class="text-center fw-bold mb-3">Misi</h3>
                            <ul>
                                <li class="mb-2">Menyediakan peralatan outdoor berkualitas tinggi dengan standar keamanan terbaik</li>
                                <li class="mb-2">Memberikan pengalaman sewa yang mudah, cepat, dan transparan</li>
                                <li class="mb-2">Mendukung komunitas pecinta alam dengan harga terjangkau</li>
                                <li>Mempromosikan kegiatan outdoor yang bertanggung jawab dan ramah lingkungan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stats-item">
                        <div class="stats-number">5+</div>
                        <div class="fw-bold">Tahun Pengalaman</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-item">
                        <div class="stats-number">500+</div>
                        <div class="fw-bold">Item Peralatan</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-item">
                        <div class="stats-number">2K+</div>
                        <div class="fw-bold">Pelanggan Puas</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stats-item">
                        <div class="stats-number">50+</div>
                        <div class="fw-bold">Destinasi Didukung</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary section-heading">Tim Kami</h2>
                <p class="text-muted">Orang-orang di balik kesuksesan GoCamps</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="/images/IHSAN.jpg" alt="Team Member">
                        <h5 class="fw-bold mb-1">IHSAN NOVAL ATHAR</h5>
                        <p class="text-muted">Founder & CEO</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.instagram.com/ghost_noval" class="text-primary"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="/images/HINGGAR.jpg" alt="Team Member">
                        <h5 class="fw-bold mb-1">HINGGAR RAMADHANA</h5>
                        <p class="text-muted">Operational Manager</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.instagram.com/haenggar" class="text-primary"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="/images/ARDHIANSYAH.jpg" alt="Team Member">
                        <h5 class="fw-bold mb-1">MUHAMMAD ARDHIANSYAH</h5>
                        <p class="text-muted">Gear Specialist</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.instagram.com/ardiandragneel" class="text-primary"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="/images/RENDRA.jpg" alt="Team Member">
                        <h5 class="fw-bold mb-1">RENDRA KRESTA VIOLA</h5>
                        <p class="text-muted">Customer Service</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="https://www.instagram.com/mzzrend" class="text-primary"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary section-heading">Perjalanan Kami</h2>
                <p class="text-muted">Bagaimana kami memulai dan berkembang</p>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <h4 class="fw-bold">2018 - Pendirian</h4>
                    <p>GoCamps didirikan oleh Andi Wijaya dengan 20 item peralatan camping di Surabaya.</p>
                </div>
                <div class="timeline-item">
                    <h4 class="fw-bold">2019 - Ekspansi Pertama</h4>
                    <p>Menambah koleksi peralatan hiking dan membuka cabang di Malang.</p>
                </div>
                <div class="timeline-item">
                    <h4 class="fw-bold">2020 - Platform Online</h4>
                    <p>Meluncurkan website dan aplikasi untuk pemesanan online.</p>
                </div>
                <div class="timeline-item">
                    <h4 class="fw-bold">2022 - Partner Brand</h4>
                    <p>Bekerja sama dengan brand outdoor ternama seperti Consina dan AREI.</p>
                </div>
                <div class="timeline-item">
                    <h4 class="fw-bold">2024 - Go National</h4>
                    <p>Ekspansi ke 5 kota besar di Indonesia dengan lebih dari 500 item peralatan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">Siap untuk Petualangan Anda?</h2>
                    <p class="lead mb-5">Temukan peralatan terbaik untuk perjalanan Anda dengan harga terjangkau.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('katalog.index') }}" class="btn btn-light btn-lg px-4">Sewa Sekarang</a>
                        <a href="{{ route('kontak') }}" class="btn btn-outline-light btn-lg px-4">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (same as home page) -->
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
                                class="text-white text-decoration-none">Ketentuan Penggunaan</a></li>
                        <li class="mb-2"><a href="{{ route('app-privacy') }}"
                                class="text-white text-decoration-none">Kebijakan Privasi Aplikasi</a>
                        </li>
                        <li class="mb-2"><a href="{{ route('privacy-policy') }}"
                                class="text-white text-decoration-none">Kebijakan Privasi Website</a>
                        </li>
                        <li class="mb-2"><a href="{{ route('terms-conditions') }}"
                                class="text-white text-decoration-none">Syarat dan Ketentuan Sewa</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Basecamp GoCamps</h6>
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
                    <h6 class="fw-bold mb-3">GoCamps Outdoor</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('tentang-kami') }}"
                                class="text-white text-decoration-none"><i
                                    class="fas fa-info-circle me-2"></i>Tentang Kami</a></li>
                        <li class="mb-2"><a href="{{ route('kontak') }}"
                                class="text-white text-decoration-none"><i
                                    class="fas fa-envelope me-2"></i>Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center small pt-3">
                <p class="mb-0">GoCamps – Sewa Alat Camping dan Hiking</p>
                <p>© 2025 All rights reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>