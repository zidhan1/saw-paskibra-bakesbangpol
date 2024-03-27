<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // menambahkan default data kriteria
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'parade',
            'bobot' => 0.35
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'pbb',
            'bobot' => 0.25
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'kesehatan',
            'bobot' => 0.15
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'samapta',
            'bobot' => 0.1
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'wawancara',
            'bobot' => 0.05
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'wawasan kebangsaan',
            'bobot' => 0.05
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'pengetahuan umum',
            'bobot' => 0.05
        ]);
    }
}
