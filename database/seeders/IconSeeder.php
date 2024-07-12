<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            'nama' => 'Jagung',
            'url_icon' => 'jagung.png'
            ],
            [
                'nama' => 'Padi ',
                'url_icon' => 'padi.png'   
            ],
            [
                'nama' => 'Sawit',
                'url_icon' => 'sawit.png'   
            ],
            [
                'nama' => 'Karet',
                'url_icon' => 'karet.png'   
            ]
        ];
        DB::table('icon')->insert($data);
    }
}
