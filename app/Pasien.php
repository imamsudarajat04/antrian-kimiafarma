<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "pasiens";

    protected $fillable = [
        'noAntrian',
        'nama',
        'tempat',
        'tglLahir',
        'jenisKelamin',
        'umur',
        'alamat'
    ];

    public function Resep()
    {
        return $this->hasOne('App\Resep');
    }
}
