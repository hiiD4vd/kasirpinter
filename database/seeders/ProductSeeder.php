<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Ayam Goreng', 'stock' => 100, 'price' => 15000, 'category_id' => 1, 'supplier_id' => 1],
            ['name' => 'Ikan Bakar', 'stock' => 50, 'price' => 20000, 'category_id' => 2, 'supplier_id' => 2],
            ['name' => 'Kangkung', 'stock' => 30, 'price' => 5000, 'category_id' => 3, 'supplier_id' => 3],
            ['name' => 'Tempe Goreng', 'stock' => 100, 'price' => 3000, 'category_id' => 3, 'supplier_id' => 3],
            ['name' => 'Sambal Pedas', 'stock' => 200, 'price' => 2000, 'category_id' => 4, 'supplier_id' => 5]
        ]);
    }
}
