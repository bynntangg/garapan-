@extends('layout.template-admin')

@section('title', 'Data Alat Camping')

@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Daftar Alat Camping</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Tambah Alat
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($alats->isEmpty())
                <p class="text-muted">Belum ada data alat.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga Sewa</th>
                                <th>Ketersediaan</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alats as $index => $alat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $alat->nama }}</td>
                                    <td>{{ $alat->jenis ?? '-' }}</td>
                                    <td>Rp {{ number_format($alat->harga_sewa, 0, ',', '.') }}</td>
                                    <td>{{ $alat->ketersediaan }}</td>
                                    <td>{{ $alat->deskripsi }}</td>
                                    <td>
                                        @if ($alat->gambar)
                                            <img src="{{ asset('storage/' . $alat->gambar) }}"
                                                alt="Gambar {{ $alat->nama }}" width="80" data-bs-toggle="modal"
                                                data-bs-target="#imageModal{{ $alat->id }}">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $alat->id }}">Edit</button>
                                        <form action="{{ route('alats.destroy', $alat->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit Alat -->
                                <div class="modal fade" id="editModal{{ $alat->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel{{ $alat->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form method="POST" action="{{ route('alats.update', $alat->id) }}"
                                            enctype="multipart/form-data" class="modal-content">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $alat->id }}">Edit Alat
                                                    Camping</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Alat</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        value="{{ $alat->nama }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis</label>
                                                    <input type="text" class="form-control" name="jenis"
                                                        value="{{ $alat->jenis }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Harga Sewa</label>
                                                    <input type="number" class="form-control" name="harga_sewa"
                                                        value="{{ $alat->harga_sewa }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Ketersediaan</label>
                                                    <input type="number" class="form-control" name="ketersediaan"
                                                        value="{{ $alat->ketersediaan }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Gambar</label>
                                                    <input type="file" class="form-control" name="gambar"
                                                        accept="image/*">
                                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti
                                                        gambar</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" rows="3" required>{{ $alat->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Gambar -->
                                <div class="modal fade" id="imageModal{{ $alat->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content bg-transparent border-0"
                                            style="background-color: rgba(0,0,0,0.8);">
                                            <div class="modal-body text-center p-0 position-relative">
                                                <button type="button"
                                                    class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                <img src="{{ asset('storage/public/gambar_alat' . $alat->gambar) }}"
                                                    alt="Gambar {{ $alat->nama }}" width="80">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('alats.store') }}" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Alat Camping</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Alat</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <input type="text" class="form-control" name="jenis">
                    </div>
                    <div class="mb-3">
                        <label for="harga_sewa" class="form-label">Harga Sewa</label>
                        <input type="number" class="form-control" name="harga_sewa" required>
                    </div>
                    <div class="mb-3">
                        <label for="ketersediaan" class="form-label">Ketersediaan</label>
                        <input type="number" class="form-control" name="ketersediaan" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection
