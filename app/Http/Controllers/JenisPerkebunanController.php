<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JenisPerkebunan;
use App\Models\Icon;
use function Laravel\Prompts\table;

class JenisPerkebunanController extends Controller
{
    private JenisPerkebunan $jenisPerkebunan;

    public function __construct(){
        $this->jenisPerkebunan = new JenisPerkebunan();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Jenis Perkebunan',
        ];
        $jenis = $this->jenisPerkebunan->all();
        return view('Content.jenis-perkebunan',$data,compact('jenis'));
    }

    public function tambah(){
        $data = [
            'title' => 'Tambah Jenis Perkebunan'
        ];
        $icons = Icon::all();
        return view('Content.jenis-perkebunan-input',$data,compact('icons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hex_warna' => 'required|string|max:7',
            'id_icon' => 'required|integer',
        ]);

        $data = [
            'nama' => $request->nama,
            'warna' => $request->hex_warna,
            'id_icon' => $request->id_icon
        ];
//        dd($request->all());
        DB::table('jenis_perkebunan')->insert($data);
        return redirect()->route('jenis_perkebunan')->with('success', 'Jenis Perkebunan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $jenisPerkebunan = JenisPerkebunan::findOrFail($id);
        $jenisPerkebunan->delete();

        return redirect()->route('jenis_perkebunan')->with('success', 'Jenis Perkebunan berhasil dihapus.');
    }
}
