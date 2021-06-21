<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $table = 'disposisi';
    protected $fillable = ['no_agenda', 'surat_id', 'kepada', 'keterangan', 'tanggapan', 'user_id'];

    public function suratmasuk ()
    {
        return $this->belongsTo('App\Suratmasuk');
    }


    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
