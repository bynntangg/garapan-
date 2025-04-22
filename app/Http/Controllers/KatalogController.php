<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        // Group alat berdasarkan kolom 'jenis' 
        $groupedAlats = Alat::latest()
            ->get()
            ->groupBy('jenis');

        return view('katalog.index', compact('groupedAlats'));
    }

    public function detail($id)
    {
        $alat = Alat::findOrFail($id);
        return view('katalog.detail', compact('alat'));
    }


}