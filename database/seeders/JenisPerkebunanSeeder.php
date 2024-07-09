<?php

namespace Database\Seeders;

use App\Models\JenisPerkebunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPerkebunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisPerkebunan::create([
            'nama' => 'Jenis Perkebunan 1',
            'warna' => 'Merah',
            'id_icon' => 1
        ]);
    }
}
