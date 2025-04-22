<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Alat - GoCamps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2b6cb0;
            --primary-light: #ebf4ff;
            --secondary: #4a5568;
            --dark: #1a202c;
            --light: #f7fafc;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--secondary);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .nav-link {
            font-weight: 500;
            position: relative;
        }

        .nav-link.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--primary);
            border-radius: 2px;
        }

        /* Card Styles */
        .equipment-card {
            transition: var(--transition);
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: var(--shadow-sm);
            background: white;
        }

        .equipment-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .equipment-card .card-img-top {
            height: 180px;
            object-fit: cover;
            object-position: center;
        }

        .equipment-card .card-body {
            padding: 1rem;
        }

        .equipment-card .card-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .equipment-card .card-text {
            color: var(--secondary);
            font-size: 0.875rem;
        }

        .price-tag {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        /* Category Header */
        .category-header {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .category-header h2 {
            font-weight: 700;
            color: var(--dark);
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        .category-header h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px;
        }

        /* Bottom Navigation */
        .bottom-nav {
            border-radius: 16px 16px 0 0;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.08);
        }

        .bottom-nav .nav-link {
            color: var(--secondary);
            text-align: center;
            padding: 0.5rem;
            font-size: 0.75rem;
        }

        .bottom-nav .nav-link.active {
            color: var(--primary);
        }

        .bottom-nav .nav-link i {
            display: block;
            font-size: 1.25rem;
            margin-bottom: 4px;
        }

        /* Search Bar */
        .search-bar {
            position: relative;
            margin-bottom: 2rem;
        }

        .search-bar input {
            padding-left: 40px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow-sm);
        }

        .search-bar .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary);
        }

        /* User Dropdown */
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-light);
        }

        /* Responsive Adjustments */
        @media (min-width: 992px) {
            .equipment-card .card-img-top {
                height: 200px;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }
    </style>
</head>

<body>
    <div class="min-vh-100 pb-5" style="padding-bottom: 80px !important;">
        {{-- HEADER --}}
        <header class="bg-primary shadow-sm sticky-top">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('user.index') }}">
                        <i class="fa fa-campground text-white fs-4"></i>
                        <span class="text-white fw-bold">GoCamps</span>
                    </a>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebar">
                        <i class="fas fa-bars text-white fs-5"></i>
                    </button>
        
                    <div class="collapse navbar-collapse d-flex align-items-center" id="navbarNav">
                        {{-- Back Button di Tengah --}}
                        <a href="{{ route('user.index') }}"
                           class="btn btn-outline-light mx-auto">
                            <i class="fas fa-arrow-left me-1"></i> Kembali ke Home
                        </a>
                    
                        {{-- Profile Dropdown tetap di kanan --}}
                        @auth
                            <div class="dropdown">
                                <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2"
                                        type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/images/users.jpg" alt="User"
                                         class="rounded-circle border border-white"
                                         style="width: 36px; height: 36px; object-fit: cover;">
                                    <span class="fw-semibold text-white">{{ auth()->user()->name }}</span>
                                </button>
                    
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                           href="{{ route('profile.edit') }}">
                                            <i class="fas fa-user-circle text-primary"></i>
                                            <span>My Profile</span>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                    class="dropdown-item d-flex align-items-center gap-2 py-2">
                                                <i class="fas fa-sign-out-alt text-primary"></i>
                                                <span>{{ __('Log Out') }}</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>            
                </div>
            </nav>
        </header>


        {{-- SIDEBAR --}}
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
            <div class="offcanvas-header border-bottom py-3">
                <h5 class="offcanvas-title d-flex align-items-center gap-2">
                    <i class="fa fa-campground text-primary"></i>
                    <span>GoCamps</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-3">
                <nav class="d-flex flex-column gap-2">
                    <a href="user"
                        class="text-decoration-none text-dark py-2 px-3 rounded d-flex align-items-center gap-3 hover-primary">
                        <i class="fas fa-home text-primary"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#"
                        class="text-decoration-none text-dark py-2 px-3 rounded d-flex align-items-center gap-3 hover-primary">
                        <i class="fas fa-info-circle text-primary"></i>
                        <span>Tentang</span>
                    </a>
                    <hr class="my-2">
                </nav>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <main class="container py-4">
            <!-- Search Bar -->
            <div class="search-bar animate-fade-in">
                <div class="position-relative">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="form-control py-2 ps-4" placeholder="Cari peralatan camping...">
                </div>
            </div>

            <!-- Categories -->
            @foreach ($groupedAlats as $jenis => $items)
                <div class="mb-5 animate-fade-in delay-{{ ($loop->index % 3) + 1 }}">
                    <div class="category-header">
                        <h2>{{ $jenis }}</h2>
                    </div>

                    <div class="row g-4">
                        @foreach ($items as $alat)
                            <div class="col-6 col-md-4 col-lg-3">
                                <a href="{{ route('katalog.detail', $alat->id) }}" class="text-decoration-none">
                                    <div class="card equipment-card h-100">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $alat->gambar) }}"
                                                alt="{{ $alat->nama }}" class="img-fluid">

                                            <span class="price-tag">Rp
                                                {{ number_format($alat->harga_sewa, 0, ',', '.') }}/hari</span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $alat->nama }}</h5>
                                            <p class="card-text text-muted small">
                                                <i class="fas fa-box-open text-primary me-1"></i> Stok:
                                                {{ $alat->ketersediaan }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </main>

        {{-- BOTTOM NAV --}}
        <nav class="navbar bottom-nav fixed-bottom bg-white py-2">
            <div class="container d-flex justify-content-around">
                <a href="{{ route('katalog.index') }}" class="nav-link active">
                    <i class="fas fa-th-list"></i>
                    <span>Katalog</span>
                </a>
                <a href="{{ route('penyewaans.index') }}" class="nav-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Keranjang</span>
                </a>
                
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add animation class when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-fade-in');
            elements.forEach(el => {
                el.style.opacity = 0;
            });

            setTimeout(() => {
                elements.forEach(el => {
                    el.style.opacity = 1;
                });
            }, 100);
        });
    </script>
</body>

</html>
