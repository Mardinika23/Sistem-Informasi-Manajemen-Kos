<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderToPenghuniKostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            $table->enum('gender', ['Pria', 'Wanita'])->after('nama')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
}
