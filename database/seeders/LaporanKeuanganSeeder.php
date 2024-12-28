<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanKeuanganSeeder extends Seeder
{
    public function run()
    {
        DB::table('laporan_keuangan')->insert([
            [
                'total_pendapatan' => 1000000,
                'total_pengeluaran' => 500000,
                'laba_bersih' => 500000,
                'tanggal' => '2023-11-01'
            ],
            [
                'total_pendapatan' => 1200000,
                'total_pengeluaran' => 550000,
                'laba_bersih' => 650000,
                'tanggal' => '2023-11-02'
            ],
            [
                'total_pendapatan' => 900000,
                'total_pengeluaran' => 450000,
                'laba_bersih' => 450000,
                'tanggal' => '2023-11-03'
            ],
            [
                'total_pendapatan' => 1100000,
                'total_pengeluaran' => 600000,
                'laba_bersih' => 500000,
                'tanggal' => '2023-11-04'
            ],
            [
                'total_pendapatan' => 950000,
                'total_pengeluaran' => 500000,
                'laba_bersih' => 450000,
                'tanggal' =>  '2023-11-05'
            ]
        ]);
    }
}
