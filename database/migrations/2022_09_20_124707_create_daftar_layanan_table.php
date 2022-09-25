<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_layanan', function (Blueprint $table) {
            $table->id('id_layanan');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');

            $table->unsignedInteger('id_unit_pengolah');
            $table->unsignedInteger('id_jenis_layanan');
            $table->unsignedInteger('id_output_layanan');

            $table->integer('lama_layanan');
            $table->integer('biaya_layanan');

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
        Schema::dropIfExists('daftar_layanan');
    }
}
