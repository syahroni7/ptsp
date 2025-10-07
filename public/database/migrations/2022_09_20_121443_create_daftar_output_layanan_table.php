<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarOutputLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_output_layanan', function (Blueprint $table) {
            $table->id('id_output_layanan');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
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
        Schema::dropIfExists('daftar_output_layanan');
    }
}
