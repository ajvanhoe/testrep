<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urlword extends Model
{
    protected $table = 'urlwords';
    protected $fillable = [
        'name',
        //'slug',
        'urlword_categories_id',
    ];

    public $timestamps = false;

    public function category() {
    	return $this->belongsTo(UrlwordCategory::class);
    }


}
