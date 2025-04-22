<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\alat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaans = Penyewaan::with(['user', 'alat'])->get();
        $users = User::all();
        $alats = alat::all();
        return view('penyewaans.index', compact('penyewaans', 'users', 'alats'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alat_id' => 'required|exists:alats,id',
            'tanggal_sewa' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa',
            'status' => 'required|in:pending,disewa,dikembalikan',
            'bukti_pembayaran' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jaminan' => 'required|string',
        ]);

        // Ambil ID alat tunggal
        $alat_id = $request->alat_id;

        // Ambil data alat
        $alat = alat::findOrFail($alat_id);

        // Hitung total harga (dianggap dikirim dari form)
        $data = $request->except('alat_id');
        $data['total_harga'] = $request->total_harga;

        // Upload gambar jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // Simpan data penyewaan
        $penyewaan = Penyewaan::create($data);

        // Simpan relasi many-to-many (walau cuma satu alat)
        $penyewaan->alat()->attach($alat_id);

        return redirect()->back()->with('success', 'Penyewaan berhasil ditambahkan!');
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'alat_id' => 'required|exists:alats,id',
            'tanggal_sewa' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa',
            'status' => 'required|in:pending,disewa,dikembalikan',
            'bukti_pembayaran' => 'nullable|image|max:2048',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jaminan' => 'required|string',
        ]);

        $alat_id = $request->alat_id;
        $alat = alat::findOrFail($alat_id);

        $data = $request->except('alat_id');
        $data['total_harga'] = $request->total_harga;

        // Ganti bukti pembayaran jika diupload ulang
        if ($request->hasFile('bukti_pembayaran')) {
            if ($penyewaan->bukti_pembayaran) {
                Storage::disk('public')->delete($penyewaan->bukti_pembayaran);
            }
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        // Update data
        $penyewaan->update($data);

        // Sync relasi (hanya satu)
        $penyewaan->alat()->sync([$alat_id]);

        return redirect()->back()->with('success', 'Penyewaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Penyewaan::destroy($id);
        return redirect()->back()->with('success', 'Penyewaan berhasil dihapus!');
    }

    // METHOD BARU: Menampilkan halaman pembayaran
    public function showPembayaran($id)
    {
        $penyewaan = Penyewaan::with('alat', 'user')->findOrFail($id);
        return view('penyewaans.pembayaran', compact('penyewaan'));
    }

    // METHOD BARU: Menyimpan bukti pembayaran
    public function bayar(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $penyewaan = Penyewaan::findOrFail($id);

        if ($penyewaan->bukti_pembayaran) {
            Storage::disk('public')->delete($penyewaan->bukti_pembayaran);
        }

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $penyewaan->update(['bukti_pembayaran' => $path]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }
}
