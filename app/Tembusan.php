<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tembusan extends Model
{
    protected $table = 'tembusan';
    protected $fillable = ['tembusan','buatsurat_id','users_id'];

    public function surat(){
    	return $this->belongsTo('App\Surat');
    }
}
