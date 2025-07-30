<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = DB::table('pembayaran')
            ->join('penghuni_kost', 'penghuni_kost.id', '=', 'pembayaran.id_penghuni')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->select(
                DB::raw('penghuni_kost.nama as nama_penghuni'),   // ALIAS FIX
                'kamar.nama_kamar',
                'kamar.harga',
                'pembayaran.periode',
                'pembayaran.bukti_bayar'
            )
            ->orderBy('pembayaran.periode', 'desc')
            ->get();

        return view('admin.laporan.index', compact('laporan'));
    }
}
