        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-campground me-2"></i>Go-Camps</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="/assets/img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('alats.index') }}" class="nav-item nav-link">
                        <i class="fa fa-th me-2"></i>Equipment
                    </a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Penjualan</a>
                    <a href="{{ route('detail-pesanan.index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Laporan Penjualan</a>
                    <a href="{{ route('halaman.login')  }}" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Users</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
