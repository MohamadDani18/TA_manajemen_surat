<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenissurat extends Model
{
    protected $table="Jenissurat";

    protected $fillable= [

        'id','jenis_surat','provider', 'provider_id'

    ];

}
