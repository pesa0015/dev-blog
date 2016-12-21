<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	/**
	 * All tests in this class are using the api
	 *
	 *=========================================*/

    /**
     * Helper function for creating users
     *
     */
    public function newUser()
    {
        return factory(App\User::class)->create();
    }

	/**
     * @group getUsers
     * Tests getting all users
     */
	public function testGetUsers()
	{
		$response = $this->call('GET', '/api/users');

		$response->getData();
	}

    /**
     * @group createUser
     * Tests creating new user
     */
    public function testCreateUser()
    {
    	$response = $this->call('POST', '/api/users', [
    			'username' => str_random(10),
    			'name' => str_random(10),
    			'slug' => str_random(10),
    			'bio' => str_random(10),
    			'email' => str_random(10).'@gmail.com',
    			'password' => bcrypt(str_random(10))
    		]);

    	$response->getData();
    }

    /**
     * @group getUserBySlug
     * Tests getting user by slug
     */
    public function testGetUserBySlug()
    {
    	$user = $this->newUser();

    	$response = $this->call('GET', '/api/users/' . $user->slug);

    	$response->getData();
    }

    /**
     * @group updateUser
     * Tests updating user by id
     */
    public function testUpdateUser()
    {
        $user = $this->newUser();

        $response = $this->call('PATCH', '/api/users/' . $user->id, [
            'bio' => 'test'
        ]);

        $response->getData();
    }

    /**
     * @group deleteUser
     * Tests deleting user by id
     */
    public function testDeleteUser()
    {
    	$user = $this->newUser();

    	$response = $this->call('DELETE', '/api/users/' . $user->id);

    	$response->getData();
    }
}
