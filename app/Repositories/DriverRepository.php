<?php

namespace App\Repositories;

use App\Driver;

class DriverRepository implements DriverRepositoryInterface
{

    protected $driver;

	public function __construct(Driver $driver)
	{
		$this->driver = $driver;
	}

	public function add($fblogin,$email,$profilequestions,$date)
	{
		$driver = new $this->driver;
		$driver->fblogin = $fblogin;
		$driver->email = $email;
		$driver->profilequestions = $profilequestions;
		$driver->date=$date;
		$driver->save();
	}

	public function delete($fblogin)
	{
		$driver = Driver::where('fblogin',$fblogin);
		$driver->delete();
	}

	public function modifyEmail($fblogin,$email)
	{
		$driver = Driver::where('fblogin',$fblogin);
		$driver->email = $email;
		$driver->save();
	}
	public function modifyProfileQuestions($fblogin,$profilequestions)
	{
		$driver = Driver::where('fblogin',$fblogin);
		$driver->profilequestions = $profilequestions;
		$driver->save();
	}
	public function getAllDrivers()
	{
		return Driver::all();
	}

}