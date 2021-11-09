<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = "antrians";

    protected $fillable = [
        'noAntrian',
        'tglAntrian',
        'status'
    ];

    public function Permohonan()
    {
        return $this->hasOne('App\Permohonan');
    }
}
