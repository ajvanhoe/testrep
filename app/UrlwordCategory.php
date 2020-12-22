<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlwordCategory extends Model
{
    protected $table = 'urlword_categories';
    protected $fillable = [
        'name',
        'description',
    ];
    
    public $timestamps = false;
    
    public function urlwords() {
        return $this->hasMany(Urlword::class);
    }


}
