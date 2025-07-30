<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghuniKostTable extends Migration
{
    public function up()
    {
        Schema::create('penghuni_kost', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kamar'); // relasi ke tabel kamar
            $table->string('nama');
            $table->enum('status_penghuni', ['Aktif', 'Nonaktif']);
            $table->timestamps();

            $table->foreign('id_kamar')->references('id')->on('kamar')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penghuni_kost');
    }
}
