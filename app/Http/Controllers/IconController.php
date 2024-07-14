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
        return $this->icon->all();
    }

    public function tambah()
    {
        return view('Content.icon-input');
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
            $path = $file->store('public/asset/icon');
            $url = Storage::url($path);

            $data = [
                'nama' => $request->nama,
                'url_icon' => $url,
            ];
            DB::table('icon')->insert($data);
            return redirect()->route('icon.tambah')->with('success', 'Icon berhasil ditambahkan.');
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
