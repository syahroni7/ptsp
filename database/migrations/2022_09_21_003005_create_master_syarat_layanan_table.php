<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSyaratLayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_syarat_layanan', function (Blueprint $table) {
            $table->id('id_master_syarat_layanan');
            $table->timestamps();
            $table->softDeletes();
            $table->text('name');
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
        Schema::dropIfExists('master_syarat_layanan');
    }
}
