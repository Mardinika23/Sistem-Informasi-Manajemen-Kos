<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        $penghuni = DB::table('penghuni_kost')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->select(
                'penghuni_kost.id as penghuni_kost_id',
                DB::raw('penghuni_kost.nama as nama_penghuni'),  // ALIAS FIX
                'penghuni_kost.status_penghuni',
                'kamar.nama_kamar',
                'kamar.harga'
            )
            ->get();

        return view('admin.beranda', compact('penghuni'));
    }
}
