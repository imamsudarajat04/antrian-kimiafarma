<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AntrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i<10; $i++)
        // {
        // }

        $data = \App\Antrian::create([
                'kode' => 'K',
                'noAntrian' => '01',
                'tglAntrian' => Carbon::now(),
                'status' => 'Waiting'
            ]);
        $data = \App\Antrian::create([
                'kode' => 'K',
                'noAntrian' => '02',
                'tglAntrian' => Carbon::now(),
                'status' => 'Waiting'
            ]);
        $data = \App\Antrian::create([
                'kode' => 'K',
                'noAntrian' => '03',
                'tglAntrian' => Carbon::now(),
                'status' => 'Waiting'
            ]);
        $data = \App\Antrian::create([
                'kode' => 'K',
                'noAntrian' => '04',
                'tglAntrian' => Carbon::now(),
                'status' => 'Waiting'
            ]);
        $data = \App\Antrian::create([
                'kode' => 'K',
                'noAntrian' => '05',
                'tglAntrian' => Carbon::now(),
                'status' => 'Waiting'
            ]);
    }
}
            