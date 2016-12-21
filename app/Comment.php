<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'user_id', 'post_id'
    ];

    public function rules()
    {
        return [
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required'
        ];
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function post()
    {
    	return $this->belongsTo('App\Post', 'post_id');
    }

    public function likes()
    {
        return $this->morphMany('App\Like');
    }
}
