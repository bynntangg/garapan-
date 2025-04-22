<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kontak Kami - GoCamps</title>
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

        /* Contact specific styles */
        .contact-section {
            padding: 5rem 0;
        }

        .contact-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.15);
        }

        .contact-icon {
            font-size: 2rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .contact-map {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
            min-height: 300px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s;
        }

        .social-icon:hover {
            background: #0d6efd;
            color: white;
            transform: translateY(-3px);
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
                        <a class="nav-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('kontak') }}">Kontak Kami</a>
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
                    <h1 class="display-4 fw-bold mb-4">Hubungi Kami</h1>
                    <p class="lead mb-5 fs-4">
                        Kami siap membantu Anda dengan segala pertanyaan tentang penyewaan peralatan outdoor
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary section-heading">Kontak GoCamps</h2>
                <p class="text-muted">Tim kami siap membantu Anda 7 hari seminggu</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card contact-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Lokasi</h4>
                            <p class="mb-0">Panjang Jiwo, Tenggilis Mejoyo, Surabaya, Indonesia, 60299</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Telepon</h4>
                            <p class="mb-1"><strong>Customer Service:</strong> +62 123 4567 890</p>
                            <p class="mb-0"><strong>WhatsApp:</strong> +62 123 4567 891</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Email</h4>
                            <p class="mb-1"><strong>Pemesanan:</strong> order@gocamps.id</p>
                            <p class="mb-0"><strong>Dukungan:</strong> support@gocamps.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card contact-card h-100">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-4 text-center">Kirim Pesan</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <select class="form-select" id="subject">
                                        <option selected>Pilih subjek...</option>
                                        <option>Pertanyaan Produk</option>
                                        <option>Pemesanan</option>
                                        <option>Keluhan</option>
                                        <option>Kerjasama</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan Anda</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary section-heading">Pertanyaan Umum</h2>
                <p class="text-muted">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bagaimana cara menyewa peralatan di GoCamps?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda dapat memesan langsung melalui website kami dengan memilih produk yang tersedia, 
                                    menentukan durasi sewa, dan melakukan pembayaran. Setelah itu, Anda bisa mengambil 
                                    pesanan di lokasi kami atau menggunakan layanan pengiriman.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apa saja metode pembayaran yang diterima?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Kami menerima pembayaran melalui transfer bank (BCA, Mandiri, BRI, BNI), 
                                    e-wallet (Gopay, OVO, Dana, ShopeePay), serta QRIS. Pembayaran tunai juga 
                                    diterima langsung di lokasi kami.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Berapa lama waktu pemrosesan pesanan?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Pesanan akan diproses dalam 1-2 jam kerja setelah pembayaran dikonfirmasi. 
                                    Untuk pesanan di luar jam operasional, akan diproses pada jam kerja berikutnya.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Apa kebijakan pembatalan pesanan?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Pembatalan dapat dilakukan maksimal 24 jam sebelum waktu pengambilan/pengiriman 
                                    dengan pengembalian dana 90%. Pembatalan dalam 24 jam tidak mendapatkan pengembalian dana.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 rounded-3 overflow-hidden shadow-sm">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Bagaimana jika peralatan rusak selama penyewaan?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Penyewa bertanggung jawab atas kerusakan peralatan selama masa sewa. Biaya perbaikan 
                                    atau penggantian akan dibebankan kepada penyewa sesuai dengan tingkat kerusakan. 
                                    Kami menyarankan untuk menggunakan peralatan dengan hati-hati sesuai petunjuk.
                                </div>
                            </div>
                        </div>
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
                    <h6 class="fw-bold mb-3">Basecamp GoCamp</h6>
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
                    <h6 class="fw-bold mb-3">GoCamp Outdoor</h6>
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
                <p class="mb-0">Nusa Outdoor – Sewa Alat Camping dan Hiking</p>
                <p>© 2025 All rights reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>