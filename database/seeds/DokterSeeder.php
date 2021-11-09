<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Dokter::create([
            'nip' => '19850510001',
            'nama' => 'Dr. Stein Albert',
            'tempat' => 'Jepang',
            'tglLahir' => Carbon::create('1985','05','10'),
            'jenisKelamin' => 'Perempuan',
            'bidangKeahlian' => 'Cardiology'
        ]);
        \App\Dokter::create([
            'nip' => '1985012002',
            'nama' => 'Dr. Alexa Melvin',
            'tempat' => 'China',
            'tglLahir' => Carbon::create('1985','01','20'),
            'jenisKelamin' => 'Laki-laki',
            'bidangKeahlian' => 'Dental'
        ]);
        \App\Dokter::create([
            'nip' => '1991120103',
            'nama' => 'Dr. Stein Albert',
            'tempat' => 'Amerika',
            'tglLahir' => Carbon::create('1991','12','01'),
            'jenisKelamin' => 'Perempuan',
            'bidangKeahlian' => 'General Health'
        ]);
    }
}
