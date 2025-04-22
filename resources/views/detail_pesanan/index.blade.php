@extends('layout.template-admin')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <h3 class="mb-4">Laporan Penjualan</h3>

            <!-- Filter Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('detail-pesanan.index') }}" class="row g-3">
                        <div class="col-md-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">Semua</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="disewa" {{ request('status') == 'disewa' ? 'selected' : '' }}>Disewa</option>
                                <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Alat</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewaans as $index => $penyewaan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $penyewaan->user->name }}</td>
                                <td>
                                    @foreach ($penyewaan->alats as $alat)
                                        <span class="badge bg-primary mb-1">{{ $alat->nama }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $penyewaan->tanggal_sewa }}</td>
                                <td>{{ $penyewaan->tanggal_kembali }}</td>
                                <td>{{ ucfirst($penyewaan->status) }}</td>
                                <td>Rp {{ number_format($penyewaan->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach

                        @if($penyewaans->isEmpty())
                            <tr>
                                <td colspan="7">Tidak ada data penyewaan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
