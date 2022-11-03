<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditDaftarArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftar_arsip', function (Blueprint $table) {
            //
            $table->json('dokumen_masuk_url')->nullable();
            $table->json('dokumen_keluar_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('=daftar_arsip', function (Blueprint $table) {
            //
        });
    }
}
