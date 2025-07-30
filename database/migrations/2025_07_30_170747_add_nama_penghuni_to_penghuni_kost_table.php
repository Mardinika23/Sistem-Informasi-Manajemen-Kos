<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaPenghuniToPenghuniKostTable extends Migration
{
    public function up()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            if (!Schema::hasColumn('penghuni_kost', 'nama_penghuni')) {
                $table->string('nama_penghuni')->nullable()->after('id');
            }
        });
    }

    public function down()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            if (Schema::hasColumn('penghuni_kost', 'nama_penghuni')) {
                $table->dropColumn('nama_penghuni');
            }
        });
    }
}
