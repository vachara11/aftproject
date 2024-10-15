<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookaft extends Model
{
    protected $table = 'bookafts'; //กาหนดชื่อตารางในฐานข้อมูล
    protected $fillable = ['numbre','date','go','to','content','practice','note'];//กำหนดให้สามารถเพิ่มข้อมูลได้ในคําสังเดียว  Mass Assignment
}
