<?php

namespace App\Http\Controllers;

use App\BookDepatmemt;
use App\Projectbook;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index(){
        $pro = Projectbook::all();
        return view('font_end.projectbook.index', compact('pro'));
    }
    public function academic(){
        $pro = BookDepatmemt::all();
        return view('font_end.projectbook.academic', compact('pro'));
    }
    public function activity(){
        $pro = Projectbook::all();
        return view('font_end.projectbook.activity', compact('pro'));
    }
}
