<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        DB::table('diskon')->insert([
            [
                'tema_diskon' => 'Diskon Awal Tahun',
                'persentase' => 10.00,
                'mulai' => '2023-01-01 00:00:00',
                'berakhir' => '2023-01-31 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Spesial',
                'persentase' => 15.00,
                'mulai' => '2023-06-01 00:00:00',
                'berakhir' => '2023-06-15 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Akhir Tahun',
                'persentase' => 20.00,
                'mulai' => '2023-12-01 00:00:00',
                'berakhir' => '2023-12-31 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Hari Kemerdekaan',
                'persentase' => 17.08,
                'mulai' => '2023-08-17 00:00:00',
                'berakhir' => '2023-08-17 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Ramadhan',
                'persentase' => 25.00,
                'mulai' => '2023-03-23 00:00:00',
                'berakhir' => '2023-04-21 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Lebaran',
                'persentase' => 30.00,
                'mulai' => '2023-04-22 00:00:00',
                'berakhir' => '2023-04-29 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Natal',
                'persentase' => 15.00,
                'mulai' => '2023-12-24 00:00:00',
                'berakhir' => '2023-12-26 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Tahun Baru',
                'persentase' => 10.00,
                'mulai' => '2023-12-31 00:00:00',
                'berakhir' => '2024-01-01 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon HUT Perusahaan',
                'persentase' => 12.00,
                'mulai' => '2023-10-10 00:00:00',
                'berakhir' => '2023-10-12 23:59:59'
            ],
            [
                'tema_diskon' => 'Diskon Ulang Tahun Member',
                'persentase' => 5.00,
                'mulai' => '2023-01-01 00:00:00',
                'berakhir' => '2023-12-31 23:59:59'
            ]
        ]);
    }
}
