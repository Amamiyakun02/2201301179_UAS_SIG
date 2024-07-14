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
                'warna' => '#FFB200',
                'id_icon' => 3
            ],
            [
                'nama' => 'Karet',
                'warna' => '#9CDBA6',
                'id_icon' => 4
            ],
            [
                'nama' => 'Padi',
                'warna' => '#FFA823',
                'id_icon' => 2
            ],
            [
                'nama' => 'Jagung',
                'warna' => '#FFDE4D',
                'id_icon' => 1
            ]
        ];
        DB::table('jenis_perkebunan')->insert($data);

    }
}
