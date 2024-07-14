<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPerkebunan;
class JenisPerkebunanController extends Controller
{
    private JenisPerkebunan $jenisPerkebunan;

    public function __construct(){
        $this->jenisPerkebunan = new JenisPerkebunan();
    }

    public function index(){
        return $this->jenisPerkebunan->all();
    }

    public function tambah(){
        return view('Content.jenis-perkebunan-input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hex_warna' => 'required|string|max:7',
            'id_icon' => 'required|integer',
        ]);
        dd($request->all());
        JenisPerkebunan::create([
            'nama' => $request->nama,
            'hex_warna' => $request->hex_warna,
            'id_icon' => $request->id_icon,
        ]);

        return redirect()->route('jenis_perkebunan.tambah')->with('success', 'Jenis Perkebunan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $jenisPerkebunan = JenisPerkebunan::findOrFail($id);
        $jenisPerkebunan->delete();

        return redirect()->route('jenis_perkebunan')->with('success', 'Jenis Perkebunan berhasil dihapus.');
    }
}
