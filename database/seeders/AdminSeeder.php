<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // menambahkan default data kriteria
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin123',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}
