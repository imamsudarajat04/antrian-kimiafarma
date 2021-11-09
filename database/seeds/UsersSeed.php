<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@kimia.com',
            'password' => bcrypt(12345),
            'level' => 'admin',
            'status' => 'Aktif'
        ]);

        \App\User::create([
            'name' => 'Dokter',
            'email' => 'dokter@kimia.com',
            'password' => bcrypt(12345),
            'level' => 'dokter',
            'status' => 'Aktif'
        ]);

        \App\User::create([
            'name' => 'Apotek',
            'email' => 'apotek@kimia.com',
            'password' => bcrypt(12345),
            'level' => 'apotek',
            'status' => 'Aktif'
        ]);

        \App\User::create([
            'name' => 'CS',
            'email' => 'cs@kimia.com',
            'password' => bcrypt(12345),
            'level' => 'cs',
            'status' => 'Aktif'
        ]);
    }
}
