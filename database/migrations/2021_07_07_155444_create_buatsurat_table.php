<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuatsuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buatsurat', function (Blueprint $table) {
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
            $table->string('tembusan1')->nullable();
            $table->string('tembusan2')->nullable();
            $table->string('tembusan3')->nullable();
            // $table->text('isi1')->nullable();
            // $table->text('isi2')->nullable();
            // $table->text('isi3')->nullable();
            $table->enum('keterangan',['Belum Terverifikasi','Terverifikasi','ditolak']);
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
        Schema::dropIfExists('buatsurat');
    }
}
