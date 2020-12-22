<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;


class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
    	'title',
		'post',
		'slug',
		'image',
		'origin'
    ];

    // formatiranje datuma

	public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
	}

}


