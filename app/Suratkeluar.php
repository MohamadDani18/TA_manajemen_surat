<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    //
    protected $table = 'suratkeluar';
    protected $fillable = ['no_surat','tujuan_surat','isi','kode','tgl_surat','filekeluar','users_id'];

    //relasi tabel user
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
