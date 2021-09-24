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
            $table->string('jenis_surat')->nullable();
            $table->string('no_surat');
            $table->string('lampiran')->nullable();
            $table->string('tempat_surat')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->string('tujuan_surat')->nullable();
            $table->string('salam_pembuka');
            $table->text('isi');
            $table->string('hari_tgl')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->text('salam_penutup');
            $table->string('tembusan1')->nullable();
            $table->string('tembusan2')->nullable();
            $table->string('tembusan3')->nullable();
            $table->text('isi1')->nullable();
            $table->text('isi2')->nullable();
            $table->text('isi3')->nullable();

            //surat perintah
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('unitkerja')->nullable();
            $table->string('tugas')->nullable();

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
