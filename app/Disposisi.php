<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable = ['tujuan','isi','tgl_disp','catatan','users_id','suratmasuk_id'];

    public function smasuk()
    {
        return $this->belongsTo('App\SuratMasuk');
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['tujuan'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['tujuan'] = json_decode($value);
    }
}
