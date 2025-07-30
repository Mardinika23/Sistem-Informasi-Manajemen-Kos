<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KamarPenghuniSeeder extends Seeder
{
    public function run()
    {
        // Tambah data kamar
        $idKamar = DB::table('kamar')->insertGetId([
            'nama_kamar' => 'Kamar 101',
            'harga' => 750000,
            'fasilitas' => 'AC, Wifi',
            'panjang' => 3,
            'lebar' => 4,
            'kapasitas' => 2,
            'keterangan' => 'Dekat jendela, cocok untuk 2 orang',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Tambah penghuni
        DB::table('penghuni_kost')->insert([
            'nama' => 'Elsa',
            'id_kamar' => $idKamar,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
