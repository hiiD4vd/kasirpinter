<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('transaction_details')->insert([
            [
                'product_id' => 1,
                'transaction_id' => 1,
                'quantity' => 2,
                'price' => 15000,
                'subtotal' => 2 * 15000, // Menghitung subtotal
            ],
            [
                'product_id' => 2,
                'transaction_id' => 1,
                'quantity' => 3,
                'price' => 5000,
                'subtotal' => 3 * 5000, // Menghitung subtotal
            ],
            [
                'product_id' => 3,
                'transaction_id' => 2,
                'quantity' => 1,
                'price' => 20000,
                'subtotal' => 1 * 20000, // Menghitung subtotal
            ],
            [
                'product_id' => 4,
                'transaction_id' => 2,
                'quantity' => 4,
                'price' => 3000,
                'subtotal' => 4 * 3000, // Menghitung subtotal
            ],
            [
                'product_id' => 5,
                'transaction_id' => 3,
                'quantity' => 1,
                'price' => 15000,
                'subtotal' => 1 * 15000, // Menghitung subtotal
            ],
           
        ]);
    }
}
