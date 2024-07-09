<?php

namespace Database\Seeders;

use App\Models\Kebun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class KebunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kebun::create([
            'nama' => 'Perkebunan 1',
            'lokasi' => 'Lokasi 1',
            'deskripsi' => 'Deskripsi 1',
            'luas' => 100.5,
            'id_jenis' => 1,
            'poligon' => 'POLYGON((0 0, 1 1, 1 0, 0 0))' // Store polygon as WKT
        ]);
    }
}
