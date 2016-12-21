<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'excerpt', 'body', 'views'
    ];

    public function rules()
    {
        return [
            'title' => 'required|unique',
            'slug' => 'required|unique'
        ];
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function likes()
    {
    	return $this->morphMany('App\Like');
    }

    public function tags()
    {
    	return $this->hasMany('App\Tag');
    }
}
