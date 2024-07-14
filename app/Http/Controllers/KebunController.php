<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebun;
use App\Models\JenisPerkebunan;
use Illuminate\Support\Facades\DB;
class KebunController extends Controller
{
    private Kebun $kebun;

    public function __construct(){
        $this->kebun = new Kebun();
    }

    private function convertPolygonToGeoJson($polygon): array
    {
        // Remove "POLYGON((" prefix and "))" suffix
        $polygon = str_replace(['POLYGON((', '))'], '', $polygon);
        // Split coordinates string into individual coordinates
        $coordinates = explode(', ', $polygon);

        // Convert each coordinate into an array of [longitude, latitude]
        $geoJsonCoordinates = [];
        foreach ($coordinates as $coordinate) {
            $points = explode(' ', $coordinate);
            $geoJsonCoordinates[] = [(float)$points[0], (float)$points[1]];
        }

        return $geoJsonCoordinates;
    }

    public function convertToWKT($coords): string
    {
        $wkt = 'POLYGON((';
        $points = [];

        foreach ($coords as $coord) {
            $points[] = $coord[0] . ' ' . $coord[1];
        }

        $wkt .= implode(', ', $points);
        $wkt .= '))';

        return $wkt;
    }
    public function index()
    {
        $data = [
            'title' => 'Data Kebun'
        ];
        $kebun = $this->kebun->with('jenisPerkebunan')->get();
        return view('Content.kebun',$data,compact('kebun'));
    }
    public function dataKebun(): array
    {
        $data = $this->kebun->with('jenisPerkebunan')->get(); // Ambil data kebun dengan relasi jenisPerkebunan
        $features = [];

        foreach ($data as $item) {
            $jenisPerkebunan = $item->jenisPerkebunan;

            $features[] = [
                "type" => "Feature",
                "properties" => [
                    "id" => $item["id"],
                    "nama" => $item["nama"],
                    "lokasi" => $item["lokasi"],
                    "deskripsi" => $item["deskripsi"],
                    "luas" => $item["luas"],
                    "jenis" => $jenisPerkebunan,
                    "icon" => $jenisPerkebunan->icon
                ],
                "geometry" => [
                    "type" => "Polygon",
                    "coordinates" => [$this->convertPolygonToGeoJson($item["poligon"])]
                ]
            ];
        }
        return $features;
    }


    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Kebun'
        ];
        $jenisPerkebunan = JenisPerkebunan::all();
        return view('Content.perkebunan-input',$data,compact('jenisPerkebunan'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'luas' => 'required|numeric',
            'id_jenis' => 'required|integer',
            'poligon' => 'required|string',
        ]);
//        dd($request->all());
            $poligonArray = json_decode($request->poligon, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Berhasil mengubah string menjadi array
                print_r($poligonArray);
            } else {
                // Terjadi kesalahan saat mengubah string menjadi array
                echo 'Error: ' . json_last_error_msg();
            }
        $data = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'luas' => $request->luas,
            'id_jenis' => $request->id_jenis,
            'poligon' => $this->convertToWKT($poligonArray),
        ];

        DB::table('kebun')->insert($data);
        return redirect()->route('kebun')->with('success', 'Kebun berhasil ditambahkan.');
    }



    public function destroy($id)
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->delete();

        return redirect()->route('kebun')->with('success', 'Kebun berhasil dihapus.');
    }
}
