<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['nama' => 'Ayam'],
            ['nama' => 'Ikan'],
            ['nama' => 'Sayuran'],
            ['nama' => 'Sambal'],
            ['nama' => 'Minuman']
        ]);
    }
}
