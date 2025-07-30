<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailFieldsToPenghuniKostTable extends Migration
{
    public function up()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            $table->string('email')->nullable()->after('gender');
            $table->string('kontak')->nullable()->after('email');
            $table->text('alamat')->nullable()->after('kontak');
            $table->string('foto_profil')->nullable()->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('penghuni_kost', function (Blueprint $table) {
            $table->dropColumn(['email', 'kontak', 'alamat', 'foto_profil']);
        });
    }
}
