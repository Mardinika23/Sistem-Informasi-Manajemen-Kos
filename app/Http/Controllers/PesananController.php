<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        $penghuni = DB::table('penghuni_kost')
            ->join('kamar', 'penghuni_kost.id_kamar', '=', 'kamar.id')
            ->select('penghuni_kost.*', 'penghuni_kost.id as penghuni_kost_id', 'kamar.*')
            ->get();

        return view('admin.pesanan.index', ['penghuni' => $penghuni]);
    }

    public function create()
    {
        $kamar = DB::table('kamar')->get();
        return view('admin.pesanan.create', ['kamar' => $kamar]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kontak' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'id_kamar' => 'required',
            'foto' => 'required|image'
        ]);

        $fotoprofil = $request->file('foto');
        $namafilefoto = time() . "-penghuni." . $fotoprofil->getClientOriginalExtension();
        $fotoprofil->move(public_path('foto_penghuni'), $namafilefoto);

        DB::table('kamar')->where('id', $request->id_kamar)->update([
            'kapasitas' => DB::raw('kapasitas - 1')
        ]);

        DB::table('penghuni_kost')->insert([
            'nama_penghuni' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'gender' => $request->gender,
            'ttl' => $request->ttl,
            'id_kamar' => $request->id_kamar,
            'foto_profil' => $namafilefoto
        ]);

        return redirect()->route('pesanan.index')->with('message', 'Pesanan baru berhasil disimpan!');
    }

    public function edit($id)
    {
        $penghuni = DB::table('penghuni_kost')->find($id);
        $kamar = DB::table('kamar')->get();
        return view('admin.pesanan.edit', compact('kamar', 'penghuni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'kontak' => 'required',
            'gender' => 'required',
            'ttl' => 'required',
            'id_kamar' => 'required',
            'status_penghuni' => 'required',
            'foto' => 'nullable|image'
        ]);

        $namafilefoto = null;
        if ($request->hasFile('foto')) {
            $fotoprofil = $request->file('foto');
            $namafilefoto = time() . "-penghuni." . $fotoprofil->getClientOriginalExtension();
            $fotoprofil->move(public_path('foto_penghuni'), $namafilefoto);
        }

        $penghuni = DB::table('penghuni_kost')->find($id);

        if ($penghuni->id_kamar != $request->id_kamar) {
            DB::table('kamar')->where('id', $request->id_kamar)->update([
                'kapasitas' => DB::raw('kapasitas - 1')
            ]);
        }

        DB::table('penghuni_kost')->where('id', $id)->update([
            'nama_penghuni' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'gender' => $request->gender,
            'ttl' => $request->ttl,
            'id_kamar' => $request->id_kamar,
            'status_penghuni' => $request->status_penghuni,
            'foto_profil' => $namafilefoto ?? $penghuni->foto_profil
        ]);

        return redirect()->route('pesanan.index')->with('message', 'Pesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('penghuni_kost')->where('id', $id)->delete();
        return redirect()->route('pesanan.index')->with('message', 'Pesanan berhasil dihapus!');
    }
}
