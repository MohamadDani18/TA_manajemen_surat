<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenissurat extends Model
{
    protected $table="Jenissurat";

    public function suratmasuk()
    {
        return $this->hasMany('App\Suratmasuk');
    }

}
