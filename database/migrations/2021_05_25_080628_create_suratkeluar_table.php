<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratkeluar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_surat');
            $table->string('lampiran');
            $table->string('tempat_surat');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->string('tujuan_surat');
            $table->string('salam_pembuka');
            $table->text('isi');
            $table->string('hari_tgl');
            $table->string('waktu');
            $table->string('tempat');
            $table->text('salam_penutup');
            $table->enum('keterangan',['belum terverifikasi','terverifikasi']);
            $table->integer('users_id')->unsigned();
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
        Schema::dropIfExists('suratkeluar');
    }
}
