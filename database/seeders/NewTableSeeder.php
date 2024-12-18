<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini
use Illuminate\Support\Facades\Hash; // Untuk hashing password (opsional)

class NewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Richo',
            'email' => 'richoandika31@gmail.com',
            'password' => Hash::make('Cvkcakcvk2104.'), // Gunakan Hash::make untuk keamanan
        ]);
    }
}
