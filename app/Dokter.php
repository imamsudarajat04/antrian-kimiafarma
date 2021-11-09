<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokters';

    protected $fillable = [
        'nip',
        'nama',
        'tempat',
        'tglLahir',
        'jenisKelamin',
        'bidangKeahlian'
    ];

    public function Resep()
    {
        return $this->hasOne('App\Resep');
    }
}
