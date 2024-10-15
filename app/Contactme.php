<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactme extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',

   ];
}
