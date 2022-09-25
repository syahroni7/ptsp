<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarSyaratLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_syarat_layanan', function (Blueprint $table) {
            $table->id('id_syarat_layanan');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('id_layanan');
            $table->integer('id_master_syarat_layanan');

            $table->string('created_by')->default('');
            $table->string('updated_by')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_syarat_layanan');
    }
}
