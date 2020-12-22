<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';
    protected $fillable = [
        'title',
        'slug',
        'levels',
        'landing_id',
        'reference_id',
        'keyword_categoy_id'
    ];

    
    public function pages() {
        return $this->belongsToMany(Page::class);
    }
    
    public function landing_page() {
        //return $this->belongsTo('App\ModelName', 'foreign_key', 'other_key');
        return $this->hasOne('App\Page', 'id', 'landing_id');
    }

    public function references_page() {
        return $this->belongsTo('App\Page', 'id', 'reference_id');
    }

    public function category() {
    	return $this->belongsTo(KeywordCategory::class);
    }
}
