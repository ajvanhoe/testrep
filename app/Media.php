<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "media";
    protected $fillable = ['file','url', 'type', 'attribute', 'article_id', 'template_id', 'title', 'alt', 'caption', 'description'];

    public $timestamps = false;
}
