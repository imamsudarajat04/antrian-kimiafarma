<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeed::class);
        $this->call(AntrianSeeder::class);
        $this->call(DokterSeeder::class);
        $this->call(PasienSeeder::class);
        $this->call(ObatSeeder::class);
    }
}
