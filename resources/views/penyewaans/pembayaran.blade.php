@extends('layouts.user')

@section('content')
<div class="container">
    <h2 class="mb-4">Pembayaran Penyewaan</h2>

    @if (!$penyewaan->bukti_pembayaran)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Silakan Scan QR Code untuk Melakukan Pembayaran
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('images/shareqr.png') }}" alt="QR Code" width="300">
                <p class="mt-3">Total Bayar: <strong>Rp{{ number_format($penyewaan->total_harga) }}</strong></p>
                {{-- Kode penyewaan disembunyikan jika belum upload --}}
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Upload Bukti Pembayaran
        </div>
        <div class="card-body">
            @if ($penyewaan->bukti_pembayaran)
                <div class="alert alert-success">
                    Bukti pembayaran sudah diupload. 
                    <a href="{{ asset('storage/' . $penyewaan->bukti_pembayaran) }}" target="_blank">Lihat</a>
                </div>
                <p>Kode Pengambilan: <strong>#{{ $penyewaan->id }}</strong></p>
            @else
                <form action="{{ route('penyewaans.bayar', $penyewaan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Pilih File Bukti Pembayaran (JPG, PNG, max 2MB)</label>
                        <input type="file" name="bukti_pembayaran" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Upload Bukti</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
