<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accnumber extends Model
{
    protected $table = 'accnumbers'; 
    protected $fillable = ['numbre','date','go','to','content','practice','note'];
}
