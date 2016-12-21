<?php

namespace App\Transformer;

use App\User;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
	public function transform(User $user)
	{
	    return [
	    	'username' => $user->username,
	    	'name' => $user->name,
	    	'slug' => $user->slug,
	    	'bio' => $user->bio,
	    	'email' => $user->email
	    ];
	}
}