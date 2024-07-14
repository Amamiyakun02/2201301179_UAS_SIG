<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class IconController extends Controller
{
    private Icon $icon;
    public function __construct(){
        $this->icon = new Icon();
    }
    public function index(){
        $data = [
            'title' => 'Data Icon'
        ];
        $marker =  $this->icon->all();
        return view('Content.icon', $data, compact('marker'));
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Icon'
        ];
        return view('Content.icon-input',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
//        dd($request->all());
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
        // Dapatkan ekstensi file
            $extension = $file->getClientOriginalExtension();
            $filename = $request->nama . '.' . $extension;
            $destinationPath = public_path('icon');
            $file->move($destinationPath, $filename);

            $data = [
                'nama' => $request->nama,
                'url_icon' => $filename,
            ];

            DB::table('icon')->insert($data);
            return redirect()->route('marker')->with('success', 'Icon berhasil ditambahkan.');
        } else {
            return back()->withErrors(['gambar' => 'Gambar tidak valid.']);
        }
    }
    public function destroy($id)
    {
        $icon = Icon::findOrFail($id);
        $icon->delete();

        return redirect()->route('icon')->with('success', 'Icon berhasil dihapus.');
    }
}
