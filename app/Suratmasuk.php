<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Suratmasuk extends Model
{
    protected $table = 'suratmasuk';
    protected $fillable = ['no_surat','asal_surat','isi','kode','tgl_surat','filemasuk','users_id'];


    //function relasi ke disposisi
    public function disp()
    {
        return $this->hasMany('App\Disposisi');
    }

    //function relasi ke user
    public function users()
    {
        return $this->belongsTo('App\User');
    }



}
