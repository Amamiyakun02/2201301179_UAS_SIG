<?php

namespace Database\Seeders;

use App\Models\JenisPerkebunan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPerkebunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Sawit',
                'warna' => 'Merah',
                'id_icon' => 3
            ],
            [
                'nama' => 'Karet',
                'warna' => 'Hijau',
                'id_icon' => 4
            ],
            [
                'nama' => 'Padi',
                'warna' => 'Orange',
                'id_icon' => 2
            ],
            [
                'nama' => 'Jagung',
                'warna' => 'Kuning',
                'id_icon' => 1
            ]
        ];
        DB::table('jenis_perkebunan')->insert($data);

    }
}
