<?php

namespace App\Repositories;

use App\Models\Users;

class UsersRepository implements UsersRepositoryInterface
{

    protected $user;

	public function __construct(Users $users)
	{
		$this->user = $users;
	}

	public function add($fblogin,$email,$profilequestions)
	{
		$user = new $this->user;
		$user->fblogin = $fblogin;
		$user->email = $email;
		$user->profilequestions = $profilequestions;
		$user->save();
	}

	public function delete($fblogin)
	{
		$user = Users::where('fblogin',$fblogin);
		$user->delete();
	}

	public function modifyEmail($fblogin,$email)
	{
		$user = Users::where('fblogin',$fblogin);
		$user->email = $email;
		$user->save();
	}
	public function modifyProfileQuestions($fblogin,$profilequestions)
	{
		$user = Users::where('fblogin',$fblogin);
		$user->profilequestions = $profilequestions;
		$user->save();
	}

}