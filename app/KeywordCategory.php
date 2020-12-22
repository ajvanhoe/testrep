<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeywordCategory extends Model
{
    protected $table = 'keyword_categories';
    protected $fillable = [
        'name',
        'description',
    ];
    
    public $timestamps = false;
    
    public function keywords() {
        return $this->hasMany(Keyword::class);
    }
}
