<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pasien::create([
            'noAntrian' => 1,
            'nama' => 'Alex',
            'tempat' => 'Tanjung Balai',
            'tglLahir' => Carbon::create('2000','01','02'),
            'jenisKelamin' => 'Laki-laki',
            'umur' => 21,
            'alamat' => 'Bebas aja dimana'
        ]);

        \App\Pasien::create([
            'noAntrian' => 2,
            'nama' => 'Rizky Hendrian',
            'tempat' => 'Jakarta',
            'tglLahir' => Carbon::create('1995','05','10'),
            'jenisKelamin' => 'Laki-laki',
            'umur' => 25,
            'alamat' => 'Bebas aja dimana'
        ]);

        \App\Pasien::create([
            'noAntrian' => 3,
            'nama' => 'Rian',
            'tempat' => 'Tanjungpinang',
            'tglLahir' => Carbon::create('2001','11','12'),
            'jenisKelamin' => 'Laki-laki',
            'umur' => 20,
            'alamat' => 'Bebas aja dimana'
        ]);

        \App\Pasien::create([
            'noAntrian' => 4,
            'nama' => 'Nurul',
            'tempat' => 'Jakarta Selatan',
            'tglLahir' => Carbon::create('1996','12','23'),
            'jenisKelamin' => 'Perempuan',
            'umur' => 24,
            'alamat' => 'Bebas aja dimana'
        ]);

        \App\Pasien::create([
            'noAntrian' => 5,
            'nama' => 'Delia',
            'tempat' => 'Tanjungpinang',
            'tglLahir' => Carbon::create('2000','12','20'),
            'jenisKelamin' => 'Perempuan',
            'umur' => 20,
            'alamat' => 'Bebas aja dimana'
        ]);
    }
}
