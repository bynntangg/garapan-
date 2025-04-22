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