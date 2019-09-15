<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarder = [];


    public function getActiveAttribute($attribute) {

        return [

            0 => 'inactive',
            1 => 'active',
            2 => 'admin',
            3 => 'super',

        ][$attribute];


    }


    public function scopeActive($query) {
        return $query->where('active', 1);
    }

}
