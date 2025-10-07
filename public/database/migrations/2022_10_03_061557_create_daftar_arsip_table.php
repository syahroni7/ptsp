<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_arsip', function (Blueprint $table) {
            $table->id('id_arsip');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('id_pelayanan')->nullable(true);
            $table->text('arsip_masuk_url')->nullable();
            $table->string('created_by_masuk')->nullable();
            $table->text('arsip_keluar_url')->nullable();
            $table->string('created_by_keluar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_arsip');
    }
}
