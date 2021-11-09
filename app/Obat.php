<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = "obats";

    protected $fillable = [
        'kodeProduksi',
        'namaObat',
        'jenisObat',
        'satuan',
        'stok',
        'tglExpired'
    ];
}
