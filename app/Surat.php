<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'buatsurat';
    protected $fillable = ['no_surat','lampiran','tempat_surat','tgl_surat','perihal','tujuan_surat','salam_pembuka',
                            'isi','hari_tgl','waktu','tempat','salam_penutup','keterangan','tembusan1','tembusan2',
                            'tembusan3','isi1','isi2','isi3'];
}
