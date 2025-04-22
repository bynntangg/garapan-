<!-- User Login -->
<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

<!-- Nama Alat -->
<div class="mb-3">
    <label>Nama Alat</label>
    <input type="text" class="form-control" value="{{ $alat->nama }}" readonly>
    <input type="hidden" name="alat_id" value="{{ $alat->id }}">
    <input type="hidden" id="harga_alat" value="{{ $alat->harga_sewa }}"> <!-- ini tambahan -->
</div>


<!-- Tanggal Sewa -->
<div class="mb-3">
    <label>Tanggal Sewa</label>
    <input type="date" id="tanggal_sewa" name="tanggal_sewa" class="form-control"
        value="{{ old('tanggal_sewa', $data->tanggal_sewa ?? '') }}" min="{{ date('Y-m-d') }}" required>
</div>


<!-- Tanggal Kembali -->
<div class="mb-3">
    <label>Tanggal Kembali</label>
    <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control"
        value="{{ old('tanggal_kembali', $data->tanggal_kembali ?? '') }}" min="" required>
</div>

<!-- Total Harga -->
<div class="mb-3">
    <label>Total Harga</label>
    <input type="number" id="total_harga" name="total_harga" class="form-control" readonly>
</div>

<!-- Status -->
<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
        @foreach (['pending', 'disewa', 'dikembalikan'] as $status)
            <option value="{{ $status }}" @selected(old('status', $data->status ?? '') == $status)>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>


<!-- Alamat -->
<div class="mb-3">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $data->alamat ?? '') }}" required>
</div>

<!-- No HP -->
<div class="mb-3">
    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $data->no_hp ?? '') }}" required>
</div>

<!-- Jaminan -->
<div class="mb-3">
    <label for="jaminan" class="form-label">Jaminan</label>
    <select name="jaminan" id="jaminan" class="form-control" required>
        <option value="">-- Pilih Jaminan --</option>
        <option value="KTP" {{ old('jaminan', $data->jaminan ?? '') == 'KTP' ? 'selected' : '' }}>KTP</option>
        <option value="SIM" {{ old('jaminan', $data->jaminan ?? '') == 'SIM' ? 'selected' : '' }}>SIM</option>
        <option value="Kartu Pelajar"
            {{ old('jaminan', $data->jaminan ?? '') == 'Kartu Pelajar' ? 'selected' : '' }}>Kartu Pelajar</option>
    </select>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalSewa = document.getElementById('tanggal_sewa');
        const tanggalKembali = document.getElementById('tanggal_kembali');
        const totalHargaInput = document.getElementById('total_harga');
        const hargaAlatInput = document.getElementById('harga_alat');

        function setTanggalKembaliMin() {
            if (tanggalSewa.value) {
                const tglSewa = new Date(tanggalSewa.value);
                tglSewa.setDate(tglSewa.getDate() +
                1); // agar tanggal kembali minimal sehari setelah tanggal sewa
                const minDate = tglSewa.toISOString().split('T')[0];
                tanggalKembali.min = minDate;

                // Reset tanggal kembali jika masih tidak valid
                if (tanggalKembali.value && tanggalKembali.value < minDate) {
                    tanggalKembali.value = '';
                    totalHargaInput.value = '';
                    alert('Tanggal kembali harus minimal sehari setelah tanggal sewa.');
                }
            }
        }

        function hitungTotalHarga() {
            const harga = parseInt(hargaAlatInput.value) || 0;
            const sewa = tanggalSewa.value;
            const kembali = tanggalKembali.value;

            if (sewa && kembali && harga > 0) {
                const tglSewa = new Date(sewa);
                const tglKembali = new Date(kembali);

                if (tglKembali >= tglSewa) {
                    const selisihMs = tglKembali - tglSewa;
                    const selisihHari = Math.max(1, Math.ceil(selisihMs / (1000 * 60 * 60 * 24)));
                    const totalHarga = harga * selisihHari;

                    totalHargaInput.value = totalHarga;
                } else {
                    totalHargaInput.value = '';
                }
            } else {
                totalHargaInput.value = '';
            }
        }

        tanggalSewa.addEventListener('change', () => {
            setTanggalKembaliMin();
            hitungTotalHarga();
        });

        tanggalKembali.addEventListener('change', hitungTotalHarga);

        // Inisialisasi saat pertama kali halaman dimuat
        setTanggalKembaliMin();
        hitungTotalHarga();
    });
</script>
