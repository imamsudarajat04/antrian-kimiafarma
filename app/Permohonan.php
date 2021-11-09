<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonans';

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'antrian_id',
        'namaPasien',
        'keluhan',
        'tglPermohonan'
    ];

    public function Pasien()
    {
        return $this->belongsTo('App\Pasien');
    }

    public function Dokter()
    {
        return $this->belongsTo('App\Dokter');
    }

    public static function joinPasien()
    {
        $data = DB::table('permohonans')
            ->join('pasiens', 'pasiens.id', 'permohonans.pasien_id')
            ->select('permohonans.*', 'pasiens.nama as NamaPasien');

        return $data;
    }

    public static function joinDokter()
    {
        $data = DB::table('permohonans')
            ->join('dokters', 'dokters.id', 'permohonans.dokter_id')
            ->select('permohonans.*', 'dokters.nama as NamaDokter');

        return $data;
    }
}
