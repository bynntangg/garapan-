<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;

class DetailPesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Penyewaan::with(['alats', 'user']);

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_sewa', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $penyewaans = $query->get();

        return view('detail_pesanan.index', compact('penyewaans'));
    }
}
