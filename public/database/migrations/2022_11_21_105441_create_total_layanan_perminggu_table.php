<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalLayananPermingguTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_layanan_perminggu', function (Blueprint $table) {
            $table->id('id_total_layanan_perminggu');
            $table->timestamps();
            $table->integer('year');
            $table->integer('week_of_year');
            $table->integer('total_pelayanan')->default(0);
            $table->enum('cron_status', ['queue', 'executed'])->default('queue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_layanan_perminggu');
    }
}
