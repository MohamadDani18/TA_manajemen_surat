<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    //
    protected $table = 'suratkeluar';
    protected $fillable = ['no_surat','lampiran','tempat_surat','tgl_surat','perihal','tujuan_surat','salam_pembuka',
                            'isi','hari_tgl','waktu','tempat','salam_penutup','keterangan'];
}
