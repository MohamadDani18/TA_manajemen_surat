<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    //
    protected $table = 'suratkeluar';
    protected $fillable = ['tujuan_surat','no_surat','jenis_surat','tanggal_surat','isi_ringkas','gambar'];

    //relasi tabel wilayah
    public function jenissurat()
    {
        return $this->belongsTo('App\Jenissurat');
    }
}
