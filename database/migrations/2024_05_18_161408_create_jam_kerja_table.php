<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jam_kerja', function (Blueprint $table) {
            $table->id();
            $table->char('kode_jam_kerja');
            $table->string('nama_jam_kerja');
            $table->time('awal_jam_masuk');
            $table->time('jam_masuk');
            $table->time('akhir_jam_masuk');
            $table->time('jam_pulang');
            $table->char('lintashari');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jam_kerja');
    }
};
