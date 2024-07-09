<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kebun;
class KebunController extends Controller
{
    private Kebun $kebun;
    public function __construct(){
        $this->kebun = new Kebun();
    }

    public function index()
    {
        return $this->kebun->all();
    }
}
