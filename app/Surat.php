<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Surat extends Model
{
    protected $table = 'buatsurat';
    protected $fillable = ['no_surat','lampiran','tempat_surat','tgl_surat','perihal','tujuan_surat','salam_pembuka',
                            'isi','hari_tgl','waktu','tempat','salam_penutup','keterangan','tembusan1','tembusan2',
                            'tembusan3','isi1','isi2','isi3'];

    use AutoNumberTrait;

    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function getAutoNumberOptions()
    {
        return [
            'no_surat' => [
                'format' => function () {
                    return '?/DC-KT/X/' . date('Y');
                },
                'length' => 3
            ]
        ];
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['tembusan1'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['tembusan1'] = json_decode($value);
    }

    public function tembusan(){
    	return $this->hasMany('App\Tembusan');
    }
}
