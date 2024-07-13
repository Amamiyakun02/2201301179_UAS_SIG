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
}
