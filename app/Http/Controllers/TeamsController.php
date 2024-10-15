<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function show(){
        return view('font_end.member.team');
    }
    public function show1(){
        return view('font_end.member.team1');
    }
    public function show2(){
        return view('font_end.member.team2');
    }

}
