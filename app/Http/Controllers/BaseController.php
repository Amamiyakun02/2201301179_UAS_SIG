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
        return view('Content.index');
    }
    public function getIcon(){
        return $this->icon->all();
    }
    public function getKebun(){
        return $this->kebun->all();
    }
    public function getJenisPerkebunan(){
        return $this->jenisPerkebunan->all();
    }
}
