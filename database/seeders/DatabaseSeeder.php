<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            // UsersSeeder::class,
            // // CustomerSeeder::class,
            // CategoriesSeeder::class,
            // SupplierSeeder::class,
            // ProductSeeder::class,
            // DiskonSeeder::class,
            // KaryawanSeeder::class,
            // TransactionSeeder::class,
            TransactionDetailSeeder::class,
            LaporanKeuanganSeeder::class,
            

            
        ]);
    }
}
