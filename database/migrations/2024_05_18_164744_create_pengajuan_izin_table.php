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
        Schema::create('pengajuan_izin', function (Blueprint $table) {
            $table->id();
            $table->char('kode_izin');
            $table->char('nik');
            $table->date('tgl_izin_dari');
            $table->date('tgl_izin_sampai');
            $table->char('status');
            $table->char('kode_cuti');
            $table->text('keterangan');
            $table->string('doc_sid');
            $table->char('status_approved');

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
        Schema::dropIfExists('pengajuan_izin');
    }
};
