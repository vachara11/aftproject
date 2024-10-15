<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memberships extends Model
{
    protected $fillable = [
        'days',
        'months',
        'years',
        'name',
        'classroom',
        'student_id',
        'department',
        'major_works',
        'day',
        'month',
        'year',
        'house_number',
        'alley',
        'road',
        'district',
        'county',
        'province',
        'zip_code',
        'phone',
        'father',
        'mother',
        'professional',
        'parent',
    ];
}
