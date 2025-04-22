<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $alat->nama }} - GoCamps</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
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

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--secondary);
        }

        .bg-primary-light {
            background-color: var(--primary-light);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            transition: var(--transition);
        }

        .btn-primary:hover {
            background-color: #2c5282;
            border-color: #2c5282;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .card {
            border: none;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .badge {
            font-weight: 500;
        }

        .total-price-container {
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow-sm);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(43, 108, 176, 0.25);
        }

        .modal-content {
            border: none;
            box-shadow: var(--shadow-lg);
            border-radius: 12px;
            overflow: hidden;
        }

        .modal-header {
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .modal-footer {
            border-top: 1px solid #e2e8f0;
        }

        .equipment-img {
            max-width: 300px;
            height: auto;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
        }

        .equipment-img:hover {
            transform: scale(1.02);
        }

        .price-badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
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
                <a href="{{ route('katalog.index') }}"
                   class="btn btn-outline-light mx-auto">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Katalog
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

    <div class="container py-5">
        <!-- Equipment Header -->
        <div class="text-center mb-5">
            <div class="position-relative d-inline-block">
                <img src="{{ asset('storage/' . $alat->gambar) }}" alt="{{ $alat->nama }}" 
                    class="equipment-img mb-4">
                <span class="badge bg-primary position-absolute top-0 start-0 m-3 price-badge shadow-sm">
                    Rp{{ number_format($alat->harga_sewa, 0, ',', '.') }}/hari
                </span>
                <span class="badge bg-{{ $alat->ketersediaan > 0 ? 'success' : 'danger' }} position-absolute top-0 end-0 m-3 price-badge shadow-sm">
                    {{ $alat->ketersediaan }} unit tersedia
                </span>
            </div>
            <h1 class="fw-bold display-5 mb-3">{{ $alat->nama }}</h1>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                {{ $alat->deskripsi ?? 'Tidak ada deskripsi tersedia' }}
            </p>
        </div>

        <!-- Equipment Details -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i> Detail Peralatan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="fw-semibold"><i class="fas fa-tag me-2 text-primary"></i> Jenis</span>
                                <span class="badge bg-primary-light text-primary rounded-pill px-3 py-2">
                                    {{ $alat->jenis }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="fw-semibold"><i class="fas fa-money-bill-wave me-2 text-primary"></i> Harga Sewa</span>
                                <span class="text-primary fw-bold">
                                    Rp{{ number_format($alat->harga_sewa, 0, ',', '.') }} / hari
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="fw-semibold"><i class="fas fa-box-open me-2 text-primary"></i> Stok Tersedia</span>
                                <span class="badge bg-{{ $alat->ketersediaan > 0 ? 'success' : 'danger' }} rounded-pill px-3 py-2">
                                    {{ $alat->ketersediaan }} unit
                                </span>
                            </li>
                            @if($alat->spesifikasi)
                                @foreach(json_decode($alat->spesifikasi, true) as $key => $value)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <span class="fw-semibold"><i class="fas fa-info-circle me-2 text-primary"></i> {{ ucfirst($key) }}</span>
                                        <span>{{ $value }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rent Button -->
        <div class="text-center mb-5">
            <button class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg" data-bs-toggle="modal" data-bs-target="#rentalModal" {{ $alat->ketersediaan <= 0 ? 'disabled' : '' }}>
                <i class="fas fa-calendar-check me-2"></i> Sewa Sekarang
            </button>
            @if($alat->ketersediaan <= 0)
                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-triangle me-2"></i> Maaf, stok alat ini sedang habis.
                </div>
            @endif
        </div>

        <!-- Rental Modal -->
        <div class="modal fade" id="rentalModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="fas fa-campground me-2"></i> Form Penyewaan</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('penyewaans.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alat_id" value="{{ $alat->id }}">
                        <div class="modal-body">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> Anda akan menyewa: <strong>{{ $alat->nama }}</strong>
                            </div>
                            
                            <div class="mb-3">
                                <label for="namaPenyewa" class="form-label">Nama Penyewa</label>
                                <input type="text" class="form-control" id="namaPenyewa" name="nama_penyewa" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggalSewa" class="form-label">Tanggal Sewa</label>
                                    <input type="date" class="form-control" id="tanggalSewa" name="tanggal_sewa" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                                    <input type="date" class="form-control" id="tanggalKembali" name="tanggal_kembali" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="jumlahUnit" class="form-label">Jumlah Unit</label>
                                <select class="form-select" id="jumlahUnit" name="jumlah">
                                    @for($i = 1; $i <= min(5, $alat->ketersediaan); $i++)
                                        <option value="{{ $i }}">{{ $i }} Unit</option>
                                    @endfor
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                            </div>
                            
                            <div class="total-price-container bg-light rounded-3 p-4 mt-4 text-center">
                                <h5 class="mb-3">Ringkasan Biaya</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Harga per hari:</span>
                                    <span class="fw-bold">Rp{{ number_format($alat->harga_sewa, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Jumlah unit:</span>
                                    <span class="fw-bold" id="unit-count">1</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Durasi sewa:</span>
                                    <span class="fw-bold" id="duration-display">0 hari</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold fs-5 text-primary">
                                    <span>Total Biaya:</span>
                                    <span id="total-price-display">Rp0</span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-check me-2"></i> Konfirmasi Sewa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate rental price
            function calculateTotalPrice() {
                const startDate = new Date(document.getElementById('tanggalSewa').value);
                const endDate = new Date(document.getElementById('tanggalKembali').value);
                const unitCount = parseInt(document.getElementById('jumlahUnit').value);
                const pricePerDay = {{ $alat->harga_sewa }};
                
                if (startDate && endDate && endDate >= startDate) {
                    const diffTime = Math.abs(endDate - startDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                    const totalPrice = pricePerDay * diffDays * unitCount;
                    
                    document.getElementById('duration-display').textContent = diffDays + ' hari';
                    document.getElementById('unit-count').textContent = unitCount + ' unit';
                    document.getElementById('total-price-display').textContent = 
                        'Rp' + totalPrice.toLocaleString('id-ID');
                } else {
                    document.getElementById('duration-display').textContent = '0 hari';
                    document.getElementById('total-price-display').textContent = 'Rp0';
                }
            }

            // Set minimum date for rental (today)
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggalSewa').min = today;
            document.getElementById('tanggalKembali').min = today;

            // Add event listeners
            document.getElementById('tanggalSewa').addEventListener('change', function() {
                document.getElementById('tanggalKembali').min = this.value;
                calculateTotalPrice();
            });
            document.getElementById('tanggalKembali').addEventListener('change', calculateTotalPrice);
            document.getElementById('jumlahUnit').addEventListener('change', calculateTotalPrice);
            
            // Initialize calculation
            calculateTotalPrice();
        });
    </script>
</body>
</html>