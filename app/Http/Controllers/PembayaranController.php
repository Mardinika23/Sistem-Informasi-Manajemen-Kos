<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        // Data penghuni untuk dropdown
        $pembayaran = DB::table('penghuni_kost')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->select(
                'penghuni_kost.id as penghuni_kost_id',
                'penghuni_kost.nama as nama_penghuni',
                'kamar.nama_kamar',
                'kamar.harga'
            )
            ->get();

        // Data pembayaran yang sudah lunas
        $lunas = DB::table('pembayaran')
            ->join('penghuni_kost', 'penghuni_kost.id', '=', 'pembayaran.id_penghuni')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->select(
                'penghuni_kost.nama as nama_penghuni',
                'kamar.nama_kamar',
                'kamar.harga',
                'pembayaran.bukti_bayar',
                'pembayaran.periode'
            )
            ->get();

        return view('admin.pembayaran.index', compact('pembayaran', 'lunas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_penghuni' => 'required',
            'periode' => 'required',
            'bukti_bayar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file = $request->file('bukti_bayar');
        $namafile = time() . "_bukti_bayar." . $file->getClientOriginalExtension();
        $file->move(public_path('foto_bukti_bayar'), $namafile);

        DB::table('pembayaran')->insert([
            'id_penghuni' => $request->id_penghuni,
            'periode' => $request->periode,
            'bukti_bayar' => $namafile
        ]);

        return redirect()->route('pembayaran.index')->with('message', 'Pembayaran berhasil disimpan!');
    }
}
