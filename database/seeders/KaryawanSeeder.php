<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('karyawan')->insert([
            ['nama' => 'Bintang', 'jabatan' => 'Pemasak', 'email' => 'bintang@gmail.com', 'telepon' => '081234567800'],
            ['nama' => 'Nafis', 'jabatan' => 'Pelayan', 'email' => 'nafis@gmail.com', 'telepon' => '081234567801'],
            ['nama' => 'Fauzan', 'jabatan' => 'Pelayan', 'email' => 'fauzan@gmail.com', 'telepon' => '081234567802'],
            ['nama' => 'Mamen', 'jabatan' => 'Pengirim', 'email' => 'mamen@gmail.com', 'telepon' => '081234567803'],
            ['nama' => 'Adit', 'jabatan' => 'Pembersih', 'email' => 'adit@gmail.com', 'telepon' => '081234567804']
        ]);
    }
}
