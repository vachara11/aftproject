<?php

namespace App\Http\Controllers;

use App\Projectbook;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index(){
        $pro = Projectbook::all();
        return view('font_end.projectbook.index', compact('pro'));
    }
}
