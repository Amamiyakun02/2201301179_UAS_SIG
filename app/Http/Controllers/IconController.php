<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icon;
class IconController extends Controller
{
    private Icon $icon;
    public function __construct(){
        $this->icon = new Icon();
    }
    public function index(){
        return $this->icon->all();
    }
}
