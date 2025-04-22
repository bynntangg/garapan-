<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alat;
use Illuminate\Support\Facades\Storage;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $alats = alat::all();
        $edit = null;

        if ($request->has('edit')) {
            $edit = alat::find($request->edit);
        }

        return view('alats.index', compact('alats', 'edit'));
    }

    // Contoh di AlatController.php
    public function katalog()
    {
        $alats = Alat::all(); // Ambil semua alat
        return view('katalog.index', compact('alats'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'nullable|string',
            'harga_sewa' => 'required|integer',
            'ketersediaan' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:20480',
            'deskripsi' => 'required|string',
        ]);

        $path = $request->file('gambar')->store('gambar_alat', 'public');

        alat::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga_sewa' => $request->harga_sewa,
            'ketersediaan' => $request->ketersediaan,
            'gambar' => $path, // path disimpan relatif
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('alats.index')->with('success', 'Alat berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $alat = alat::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'nullable|string',
            'harga_sewa' => 'required|integer',
            'ketersediaan' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $data = $request->only(['nama', 'jenis', 'harga_sewa', 'ketersediaan', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($alat->gambar && file_exists(storage_path('app/public/' . $alat->gambar))) {
                Storage::disk('public')->delete($alat->gambar);
            }

            $path = $request->file('gambar')->store('gambar_alat', 'public');
            $data['gambar'] = $path;
        }

        $alat->update($data);

        return redirect()->route('alats.index')->with('success', 'Alat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $alat = alat::findOrFail($id);

        if ($alat->gambar && file_exists(storage_path('app/public/' . $alat->gambar))) {
            Storage::disk('public')->delete($alat->gambar);
        }

        $alat->delete();

        return redirect()->route('alats.index')->with('success', 'Alat berhasil dihapus!');
    }
}
