<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id'
    ];

    public function rules()
    {
        return [
            'user_id' => 'required',
            'post_id' => 'required'
        ];
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
