<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'likeable_id', 'likeable_type'
    ];

    public function rules()
    {
        return [
            'likeable_id' => 'required',
            'likeable_type' => 'required'
        ];
    }

    public function likeable()
    {
    	return $this->morphTo();
    }
}
