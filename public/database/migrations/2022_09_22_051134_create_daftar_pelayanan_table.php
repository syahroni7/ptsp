<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pelayanan', function (Blueprint $table) {
            $table->id('id_pelayanan');
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime('tanggal_terima')->nullable(true);
            $table->dateTime('tanggal_selesai')->nullable(true);

            $table->string('no_registrasi',16)->nullable(true);
            $table->text('perihal')->nullable(true);
            $table->string('pengirim_nama',40)->nullable(true);
            $table->string('pemohon_no_surat',50)->nullable(true);
            $table->date('pemohon_tanggal_surat')->nullable(true);
            $table->string('pemohon_nama',100)->nullable(true);
            $table->text('pemohon_alamat')->nullable(true);
            $table->string('pemohon_no_hp',15)->nullable(true);

            $table->enum('kelengkapan_syarat', ['Sudah Lengkap', 'Belum Lengkap'])->default('Belum Lengkap');
            $table->enum('status_pelayanan', ['Baru', 'Proses', 'Selesai', 'Ambil'])->default('Baru');
            $table->text('catatan')->nullable(true);
            $table->string('penerima_nama',100)->nullable(true);

            $table->unsignedInteger('id_layanan')->nullable(true);
            $table->unsignedInteger('id_unit_pengolah')->nullable(true);
            $table->unsignedInteger('id_jenis_layanan')->nullable(true);
            $table->unsignedInteger('id_output_layanan')->nullable(true);
            
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
        Schema::dropIfExists('daftar_pelayanan');
    }
}
