<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPanjangLebarToKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kamar', function (Blueprint $table) {
            // Tambah kolom panjang & lebar
            $table->integer('panjang')->after('nama_kamar');
            $table->integer('lebar')->after('panjang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kamar', function (Blueprint $table) {
            // Hapus kolom jika rollback
            $table->dropColumn(['panjang', 'lebar']);
        });
    }
}
