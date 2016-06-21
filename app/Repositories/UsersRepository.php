<?php

namespace App\Repositories;

use App\Users;

class UsersRepository implements UsersRepositoryInterface
{

    protected $user;

	public function __construct(Users $users)
	{
		$this->user = $users;
	}

	public function save($usersdata)
	{
		$users = new $this->user;
		$users->email = $usersdata;
		$users->save();
	}

}