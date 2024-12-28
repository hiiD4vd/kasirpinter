<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->insert([
            ['nama' => 'Asep Ayam', 'alamat' => 'Jalan Ayam No. 1', 'telepon' => '081234567800'],
            ['nama' => 'Bambang Bumbu', 'alamat' => 'Jalan Bumbu No. 2', 'telepon' => '081234567801'],
            ['nama' => 'Ahmad Sayur', 'alamat' => 'Jalan Sayur No. 3', 'telepon' => '081234567802'],
            ['nama' => 'Lewenussa Minyak', 'alamat' => 'Jalan Minyak No. 4', 'telepon' => '081234567803'],
            ['nama' => 'Billie Sambal', 'alamat' => 'Jalan Sambal No. 5', 'telepon' => '081234567804']
        ]);
    }
}
