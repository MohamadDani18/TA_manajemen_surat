<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    //
    protected $table = 'suratmasuk';
    protected $fillable = ['asal_surat','no_surat','penerima_surat','jenis_surat','tanggal_surat','isi_ringkas','gambar'];

    //relasi tabel wilayah
    public function jenissurat()
    {
        return $this->belongsTo('App\Jenissurat');
    }
}
