<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';
    protected $fillable = ['id_surat','tujuan_disposisi','isi_disposisi','sifat','batas_waktu'];
}
