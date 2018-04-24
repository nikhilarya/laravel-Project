<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function articles()
    {
        // any tags may be applied to any article 
        return $this->belongsToMany(Article::class); 
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }
}
