<?php

namespace App\Repositories;

use App\Profilequestions;

class ProfilequestionsRepository implements ProfilequestionsRepositoryInterface
{

    protected $profilequestions;

	public function __construct(Profilequestions $profques)
	{
		$this->profilequestions = $profques;
	}

	public function save($profquesdata)
	{
		$nprofques = new $this->profilequestions;
		$nprofques->profilequestions = $profilequestionsdata;
		$nprofques->save();
	}

}