<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
    protected $table = 'metatags';
    protected $fillable = [
        'name',
        'title',
        'keywords',
        'description',
        'robots',
        'jsonld',
        'canonical'
    ];

    public $timestamps = false;

    // public function page() {
    //     //return $this->belongsTo('App\ModelName', 'foreign_key', 'other_key');
    //     return $this->belongsTo('App\Page', 'metatag_id');
    // }



}
