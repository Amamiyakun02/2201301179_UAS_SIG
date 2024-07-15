<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebun;
use App\Models\Icon;
use App\Models\JenisPerkebunan;
class BaseController extends Controller
{
    private Icon $icon;
    private Kebun $kebun;
    private JenisPerkebunan $jenisPerkebunan;
    public function __construct(){
        $this->icon = new Icon();
        $this->kebun = new Kebun();
        $this->jenisPerkebunan = new JenisPerkebunan();
    }

    public function index(){
        $data = [
            'title' => 'Daerah Perkebunan Kabupaten Tanah Laut'
        ];
        $jumlahKebun = Kebun::count();
        $jumlahJenisPerkebunan = JenisPerkebunan::count();
        return view('Content.index', $data, compact('jumlahKebun', 'jumlahJenisPerkebunan'));
    }

    public function getIcon(){
        return $this->icon->all();
    }
    public function getKebun($id)
    {
        $kebun = $this->kebun->with('jenisPerkebunan')->find($id);

        if (!$kebun) {
            return response()->json(['message' => 'Kebun not found'], 404);
        }

        return response()->json([
            'id' => $kebun->id,
            'nama' => $kebun->nama,
            'lokasi' => $kebun->lokasi,
            'deskripsi' => $kebun->deskripsi,
            'luas' => $kebun->luas,
            'jenis' => $kebun->jenisPerkebunan ? $kebun->jenisPerkebunan->nama : null,
            'poligon' => $kebun->poligon,
        ]);
    }
    
    public function getJenisPerkebunan(){
        return $this->jenisPerkebunan->all();
    }
}
