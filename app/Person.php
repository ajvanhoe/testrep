<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarder = [];

    protected $attributes = [
        'active' => 0,

    ];

    public function getActiveAttribute($attribute) {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions() {
        return [

            0 => 'inactive',
            1 => 'active',
            2 => 'admin',
            3 => 'super',

        ];
    }


    public function scopeActive($query) {
        return $query->where('active', 1);
    }

}
