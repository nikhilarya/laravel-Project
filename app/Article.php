<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Article extends Model
{
    protected $fillable  = [
    	'title',
    	'body',
    	// 'published_at'
    ];

    public function setPublishedAtAttribute($date)
    {
    	//$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    	$this->attributes['published_at'] = Carbon::parse($date)->format('Y-m-d');
    	//$this->attributes['published_at'] = Parse($date)
    	//dd($date);
    }

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month'])) {

            $query->whereMonth('published_at', Carbon::parse($filters['month'])->month);
        }
        
        if (isset($filters['year'])) {

            $query->whereYear('published_at', $filters['year']);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(published_at) year, monthname(published_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(published_at) desc')
            ->get()
            ->toArray();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() //$article->user->name
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        // any tags may be applied to any article 
        return $this->belongsToMany(Tag::class); 
    }
}
