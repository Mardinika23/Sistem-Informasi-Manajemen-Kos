<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPenghuniToPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            // Tambahkan kolom id_penghuni
            $table->unsignedBigInteger('id_penghuni')->after('id')->nullable();

            // Tambahkan foreign key (opsional, jika ada relasi)
            $table->foreign('id_penghuni')
                  ->references('id')
                  ->on('penghuni_kost')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            // Hapus foreign key dulu sebelum drop kolom
            $table->dropForeign(['id_penghuni']);
            $table->dropColumn('id_penghuni');
        });
    }
}
