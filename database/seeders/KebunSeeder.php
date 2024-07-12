<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Kebun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class KebunSeeder extends Seeder
{
    public function convertToWKT($coords) {
        $wkt = 'POLYGON((';
        $points = [];
    
        foreach ($coords as $coord) {
            $points[] = $coord[0] . ' ' . $coord[1];
        }
    
        $wkt .= implode(', ', $points);
        $wkt .= '))';
    
        return $wkt;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coordinates = [
            [
                [
                    114.72719419995906,
                    -3.6863038780320068
                ],
                [
                    114.72782995986489,
                    -3.686949857680588
                ],
                [
                    114.72873158300405,
                    -3.6860039587497937
                ],
                [
                    114.72895120915172,
                    -3.684481290064795
                ],
                [
                    114.72777216350897,
                    -3.6843428655100183
                ],
                [
                    114.72647752515627,
                    -3.6852426247335472
                ],
                [
                    114.7265699993236,
                    -3.685796322264494
                ],
                [
                    114.72719419995906,
                    -3.6863038780320068
                ]
            ],
            [
                [
                    114.75741582875202,
                    -3.702429915043041
                ],
                [
                    114.7577481640887,
                    -3.7049646016438658
                ],
                [
                    114.76489337380866,
                    -3.703945990144547
                ],
                [
                    114.76942737731906,
                    -3.699516200921238
                ],
                [
                    114.76638888282065,
                    -3.697265764756054
                ],
                [
                    114.76078665858705,
                    -3.697692163626783
                ],
                [
                    114.75741582875202,
                    -3.702429915043041
                ]
            ],
            [
                [
                    114.74462886136246,
                    -3.689447638303676
                  ],
                  [
                    114.745183581059,
                    -3.692966681414589
                  ],
                  [
                    114.75045315049618,
                    -3.689758214795205
                  ],
                  [
                    114.74911934382362,
                    -3.6852326609020736
                  ],
                  [
                    114.74462886136246,
                    -3.689447638303676
                ]
            ]
        ];
        $data = [
            [
                'nama' => 'Perkebunan 1',
                'lokasi' => 'Lokasi Perkebunan 1',
                'deskripsi' => 'Deskripsi Perkebunan 1',
                'luas' => 3,
                'id_jenis' => 3,
                'poligon' => $this->convertToWKT($coordinates[0])
            ],
            [
                'nama' => 'Perkebunan 2',
                'lokasi' => 'Lokasi Perkebunan 2',
                'deskripsi' => 'Deskripsi Perkebunan 2',
                'luas' => 5,
                'id_jenis' => 1,
                'poligon' => $this->convertToWKT($coordinates[1])
            ],
            [
                'nama' => 'Perkebunan 3',
                'lokasi' => 'Lokasi Perkebunan 3',
                'deskripsi' => 'Deskripsi Perkebunan 3',
                'luas' => 2,
                'id_jenis' => 2,
                'poligon' => $this->convertToWKT($coordinates[2])
            ],
        ];
        // var_dump($data);
        DB::table('kebun')->insert($data);
    }
}
