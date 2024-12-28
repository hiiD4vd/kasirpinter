<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Dany Arya',
                'email' => 'dany@gmail.com',
                'password' => Hash::make('password123'), // Gantilah dengan password yang diinginkan
                'peran' => 'admin',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Raya No. 123',
                'foto_profil' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maheza Daud',
                'email' => 'daud@gmail.com',
                'password' => Hash::make('password123'),
                'peran' => 'admin',
                'telepon' => '089876543210',
                'alamat' => 'Jl. Kasir No. 456',
                'foto_profil' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Irfan Maulana ya maulana',
                'email' => 'irfan@gmail.com',
                'password' => Hash::make('password123'), // Gantilah dengan password yang diinginkan
                'peran' => 'kasir',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Raya No. 123',
                'foto_profil' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shelley maulina ya maulina',
                'email' => 'shelley@gmail.com',
                'password' => Hash::make('password123'),
                'peran' => 'kasir',
                'telepon' => '089876543210',
                'alamat' => 'Jl. Kasir No. 456',
                'foto_profil' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dona Alifa',
                'email' => 'alifa@gmail.com',
                'password' => Hash::make('password123'), // Gantilah dengan password yang diinginkan
                'peran' => 'kasir',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Raya No. 123',
                'foto_profil' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
