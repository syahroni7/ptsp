<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_disposisi', function (Blueprint $table) {
            $table->id('id_disposisi');
            $table->timestamps();
            $table->softDeletes();
            
            $table->unsignedInteger('id_pelayanan')->nullable(true);
            $table->unsignedInteger('id_aksi_disposisi')->nullable(true);
            $table->unsignedInteger('id_disposisi_parent')->nullable(true);
            $table->integer('urutan_disposisi')->nullable(true);
            $table->unsignedInteger('id_sender')->nullable(true);
            $table->string('username_sender')->nullable(true);;            
            $table->unsignedInteger('id_recipient')->nullable(true);
            $table->string('username_recipient')->nullable(true);;
            
            

            $table->text('keterangan')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_disposisi');
    }
}
