<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTtlToPenghuniKostTable extends Migration
{
    public function up()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            if (!Schema::hasColumn('penghuni_kost', 'ttl')) {
                $table->date('ttl')->nullable()->after('gender');
            }
        });
    }

    public function down()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            if (Schema::hasColumn('penghuni_kost', 'ttl')) {
                $table->dropColumn('ttl');
            }
        });
    }
}
