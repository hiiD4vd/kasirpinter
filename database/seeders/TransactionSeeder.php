<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'users_id' => 1, // Irfan Maulana
                'total' => 50000,
                'transaction_date' => '2023-11-01 10:00:00',
                'tema_diskon' => 'Diskon Awal Tahun'
            ],
            [
                'users_id' => 4, // dona alifa
                'total' => 70000,
                'transaction_date' => '2023-11-02 11:00:00',
                'tema_diskon' => 'Diskon Spesial'
            ],
            [
                'users_id' => 1, //  irfan Maulana
                'total' => 45000,
                'transaction_date' => '2023-11-03 12:00:00',
                'tema_diskon' => null
            ],
            [
                'users_id' => 4, //  Dona Alifa
                'total' => 60000,
                'transaction_date' =>  '2023-11-04 13:00:00',
                'tema_diskon' => 'Diskon Akhir Tahun'
            ],
            [
                'users_id' => 5, //  Shelley Maulina
                'total' => 30000,
                'transaction_date' => '2023-11-05 14:00:00',
                'tema_diskon' => 'Diskon Awal Tahun'
            ]
        ]);
    }
}
