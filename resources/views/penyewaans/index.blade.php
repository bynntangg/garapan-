<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan Alat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @stack('styles')
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
    <div class="container mt-4">
        <div class="bg-light rounded p-4">
            <h3 class="fw-bold mb-4">Daftar Penyewaan</h3>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Jaminan</th>
                            <th>Bukti</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewaans as $index => $penyewaan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $penyewaan->user->name }}</td>
                                <td>
                                    @if ($penyewaan->alat && $penyewaan->alat->count())
                                        @foreach ($penyewaan->alat as $alat)
                                            <span class="badge bg-primary mb-1">
                                                {{ $alat->nama }}
                                            </span><br>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Tidak ada alat</span>
                                    @endif
                                </td>
                                <td>{{ $penyewaan->tanggal_sewa }}</td>
                                <td>{{ $penyewaan->tanggal_kembali }}</td>
                                <td>Rp {{ number_format($penyewaan->total_harga) }}</td>
                                <td>{{ ucfirst($penyewaan->status) }}</td>
                                <td>{{ $penyewaan->alamat }}</td>
                                <td>{{ $penyewaan->no_hp }}</td>
                                <td>{{ $penyewaan->jaminan }}</td>
                                <td>
                                    @if ($penyewaan->bukti_pembayaran)
                                        <img src="{{ asset('storage/' . $penyewaan->bukti_pembayaran) }}"
                                            data-src="{{ asset('storage/' . $penyewaan->bukti_pembayaran) }}"
                                            alt="Bukti"
                                            class="img-thumbnail thumbnail-img"
                                            style="width: 100px; height: auto; cursor: pointer;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $penyewaan->id }}">
                                        Edit
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('penyewaans.destroy', $penyewaan->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus penyewaan ini?')">Hapus</button>
                                    </form>
                                    <!-- Tombol Bayar -->
                                    @if ($penyewaan->status == 'pending')
                                        <a href="{{ route('penyewaans.pembayaran', $penyewaan->id) }}"
                                            class="btn btn-success btn-sm mt-1">
                                            Bayar
                                        </a>
                                    @endif
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $penyewaan->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-white">
                                        <form action="{{ route('penyewaans.update', $penyewaan->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Penyewaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- User -->
                                                <div class="mb-3">
                                                    <label>User</label>
                                                    <select name="user_id" class="form-control" required>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}" {{ $penyewaan->user_id == $user->id ? 'selected' : '' }}>
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Alat -->
                                                <div class="mb-3">
                                                    <label>Alat</label>
                                                    <select name="alat_id[]" class="form-control" multiple required>
                                                        @foreach ($alats as $alat)
                                                            <option value="{{ $alat->id }}"
                                                                {{ $penyewaan->alat->contains('id', $alat->id) ? 'selected' : '' }}>
                                                                {{ $alat->nama_alat }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Tanggal dan lainnya -->
                                                <div class="mb-3">
                                                    <label>Tanggal Sewa</label>
                                                    <input type="date" name="tanggal_sewa" value="{{ $penyewaan->tanggal_sewa }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Tanggal Kembali</label>
                                                    <input type="date" name="tanggal_kembali" value="{{ $penyewaan->tanggal_kembali }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="pending" {{ $penyewaan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="disewa" {{ $penyewaan->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                                        <option value="dikembalikan" {{ $penyewaan->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Alamat</label>
                                                    <input type="text" name="alamat" value="{{ $penyewaan->alamat }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>No HP</label>
                                                    <input type="text" name="no_hp" value="{{ $penyewaan->no_hp }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Jaminan</label>
                                                    <input type="text" name="jaminan" value="{{ $penyewaan->jaminan }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Total Harga</label>
                                                    <input type="number" name="total_harga" value="{{ $penyewaan->total_harga }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Bukti Pembayaran</label>
                                                    <input type="file" name="bukti_pembayaran" class="form-control">
                                                    @if ($penyewaan->bukti_pembayaran)
                                                        <small class="text-muted">Bukti lama: 
                                                            <a href="{{ asset('storage/' . $penyewaan->bukti_pembayaran) }}" target="_blank">Lihat</a>
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Preview Gambar -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="previewImage" src="" class="img-fluid rounded" alt="Preview">
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Preview bukti pembayaran
            const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            const previewImage = document.getElementById('previewImage');
            document.querySelectorAll('.thumbnail-img').forEach(img => {
                img.addEventListener('click', function () {
                    const src = this.getAttribute('data-src');
                    previewImage.src = src;
                    previewModal.show();
                });
            });

            // Hitung total harga setiap kali modal Edit ditampilkan
            const editModals = document.querySelectorAll('.modal[id^="editModal"]');
            editModals.forEach(modal => {
                modal.addEventListener('shown.bs.modal', function () {
                    const alatSelect = modal.querySelector('select[name="alat_id[]"]');
                    const tanggalSewa = modal.querySelector('input[name="tanggal_sewa"]');
                    const tanggalKembali = modal.querySelector('input[name="tanggal_kembali"]');
                    const totalHargaInput = modal.querySelector('input[name="total_harga"]');

                    if (!alatSelect || !tanggalSewa || !tanggalKembali || !totalHargaInput) return;

                    function hitungTotalHarga() {
                        const selectedOptions = Array.from(alatSelect.selectedOptions);
                        let hargaPerHari = 0;

                        selectedOptions.forEach(option => {
                            const harga = parseInt(option.dataset.harga) || 0;
                            hargaPerHari += harga;
                        });

                        const sewa = tanggalSewa.value;
                        const kembali = tanggalKembali.value;

                        if (sewa && kembali && hargaPerHari > 0) {
                            const tglSewa = new Date(sewa);
                            const tglKembali = new Date(kembali);

                            if (tglKembali >= tglSewa) {
                                const selisihMs = tglKembali - tglSewa;
                                const selisihHari = Math.max(1, Math.ceil(selisihMs / (1000 * 60 * 60 * 24)));
                                const totalHarga = hargaPerHari * selisihHari;
                                totalHargaInput.value = totalHarga;
                            } else {
                                totalHargaInput.value = '';
                            }
                        } else {
                            totalHargaInput.value = '';
                        }
                    }

                    // Pasang event listener
                    alatSelect.addEventListener('change', hitungTotalHarga);
                    tanggalSewa.addEventListener('change', hitungTotalHarga);
                    tanggalKembali.addEventListener('change', hitungTotalHarga);

                    hitungTotalHarga(); // Jalankan saat modal ditampilkan
                });
            });
        });
    </script>
</body>
</html>