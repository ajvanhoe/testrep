<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'slug',
        'type',         // home, page, landing,   
        'index',        // (int)
        'urlwords',
        'content',
        'template_id',
        'parent_id',
        'metatag_id',
        'domain_id',
    ];

    public function metatags() {
        //return $this->hasOne('App\ModelName', 'foreign_key', 'local_key');
        return $this->hasOne('App\Metatag', 'id', 'metatag_id');
    }

    public function sub_pages() {
        return $this->hasMany('App\Page', 'parrent_id', 'id');
    }

    public function parrent_page() {
        return $this->belongsTo('App\Page', 'parrent_id', 'id');
    }

    public function template() {
        return $this->hasOne('App\Template', 'id', 'template_id');
    }

    public function keywords() {
        return $this->belongsToMany(Keyword::class);
    }

    

}
