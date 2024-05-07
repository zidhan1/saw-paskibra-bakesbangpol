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
            'tipe' => 'benefit',
            'bobot' => 0.35
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'pbb',
            'tipe' => 'benefit',
            'bobot' => 0.25
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'kesehatan',
            'tipe' => 'benefit',
            'bobot' => 0.15
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'samapta',
            'tipe' => 'benefit',
            'bobot' => 0.1
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'wawancara',
            'tipe' => 'benefit',
            'bobot' => 0.05
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'wawasan kebangsaan',
            'tipe' => 'benefit',
            'bobot' => 0.05
        ]);

        DB::table('kriteria')->insert([
            'nama_kriteria' => 'pengetahuan umum',
            'tipe' => 'benefit',
            'bobot' => 0.05
        ]);
    }
}
