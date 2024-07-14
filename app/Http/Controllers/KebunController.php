<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebun;
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
    public function index(): array
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
                    "icon" => $jenisPerkebunan->icon  // Menambahkan icon dari jenisPerkebunan
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
        return view('Content.perkebunan-input');
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
        $data = [
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'luas' => $request->luas,
            'id_jenis' => $request->id_jenis,
            'poligon' => $this->convertToWKT($request->poligon),
        ];

        DB::table('kebun')->insert($data);
        return redirect()->route('kebun.tambah')->with('success', 'Kebun berhasil ditambahkan.');
    }



    public function destroy($id)
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->delete();

        return redirect()->route('kebun')->with('success', 'Kebun berhasil dihapus.');
    }
}
