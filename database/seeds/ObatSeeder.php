<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Obat::create([
            'kodeProduksi' => Str::random(5),
            'namaObat' => 'Allerin 120 cc',
            'jenisObat' => 'Obat Terbatas',
            'satuan' => 'Botol',
            'stok' => 99,
            'tglExpired' => Carbon::now(),
        ]);

        \App\Obat::create([
            'kodeProduksi' => Str::random(5),
            'namaObat' => 'Petidin',
            'jenisObat' => 'Obat Narkotika',
            'satuan' => 'Tablet',
            'stok' => 99,
            'tglExpired' => Carbon::now(),
        ]);

        \App\Obat::create([
            'kodeProduksi' => Str::random(5),
            'namaObat' => 'Betadine Vag Plus',
            'jenisObat' => 'Obat Bebas',
            'satuan' => 'Botol',
            'stok' => 99,
            'tglExpired' => Carbon::now(),
        ]);

        \App\Obat::create([
            'kodeProduksi' => Str::random(5),
            'namaObat' => 'Amoxicillin',
            'jenisObat' => 'Obat Terbatas',
            'satuan' => 'Tablet',
            'stok' => 99,
            'tglExpired' => Carbon::now(),
        ]);

        \App\Obat::create([
            'kodeProduksi' => Str::random(5),
            'namaObat' => 'Antimo',
            'jenisObat' => 'Obat Bebas',
            'satuan' => 'Strips',
            'stok' => 99,
            'tglExpired' => Carbon::now(),
        ]);

        \App\Obat::create([
            'kodeProduksi' => Str::random(5),
            'namaObat' => 'Diazepam',
            'jenisObat' => 'Obat Keras',
            'satuan' => 'Tablet',
            'stok' => 99,
            'tglExpired' => Carbon::now(),
        ]);
    }
}
