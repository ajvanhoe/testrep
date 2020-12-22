<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'templates';
    protected $fillable = [
        'hero',
        'template',
        'body'
        
    ];

    public $timestamps=false;

    public function template() {
        return $this->belongsTo('App\Page', 'template_id');
    }
}
