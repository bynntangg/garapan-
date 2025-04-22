<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebijakan Privasi Website - GoCamps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .content-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header-bg {
            background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);
        }

        /* Additional styles for the new navigation */
        .desktop-nav {
            display: none;
        }

        @media (min-width: 768px) {
            .desktop-nav {
                display: flex;
                gap: 2rem;
                margin-left: auto;
            }

            .desktop-nav a {
                color: white;
                text-decoration: none;
                transition: color 0.3s;
            }

            .desktop-nav a:hover {
                color: rgba(255, 255, 255, 0.8);
            }

            .desktop-nav .text-blue-600 {
                color: #0d6efd;
                font-weight: 500;
            }
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

<body>
    <!-- Navbar -->
    <!-- Enhanced Navbar -->
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
                        <a class="nav-link" href="{{ route('terms-of-use') }}">Ketentuan Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('terms-conditions') }}">Syarat dan Ketentuan Sewa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('app-privacy') }}">Kebijakan Privasi Aplikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('privacy-policy') }}">Kebijakan Privasi Website</a>
                    </li>
                </ul>
                
                @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/img/user.jpg" alt="User" class="rounded-circle me-2 user-avatar" width="40"
                                height="40">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i>My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card content-card">
                    <div class="card-header header-bg text-white">
                        <h2 class="mb-0"><i class="fas fa-shield-alt me-2"></i>Kebijakan Privasi Website</h2>
                    </div>
                    <div class="card-body">
                        <h4 class="text-primary mt-3">1. Informasi yang Kami Kumpulkan</h4>
                        <p>Kami dapat mengumpulkan informasi berikut:</p>
                        <ul>
                            <li>Informasi pribadi (nama, alamat email, nomor telepon)</li>
                            <li>Data transaksi</li>
                            <li>Informasi teknis (alamat IP, jenis browser)</li>
                        </ul>

                        <h4 class="text-primary mt-4">2. Penggunaan Informasi</h4>
                        <p>Informasi yang kami kumpulkan digunakan untuk:</p>
                        <ul>
                            <li>Memproses transaksi</li>
                            <li>Meningkatkan layanan kami</li>
                            <li>Mengirim notifikasi penting</li>
                        </ul>

                        <h4 class="text-primary mt-4">3. Perlindungan Data</h4>
                        <p>Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi data pribadi Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="text-center">
                <p class="mb-0">© 2025 GoCamps - Sewa Peralatan Outdoor</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
