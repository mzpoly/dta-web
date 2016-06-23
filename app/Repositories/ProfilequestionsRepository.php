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

	public function add($profilequestion)
	{
		$nprofques = new $this->profilequestions;
		$nprofques->profilequestion = $profilequestion;
		$nprofques->save();
	}
	
	public function delete($id)
	{
		$profilequestion=Profilequestions::where('id',$id);
		$profilequestion->delete();
	}
	
	public function modify($id, $profilequestion)
	{
		$profques=Profilequestions::where('id',$id);
		$profques->profilequestion = $profilequestion;
		$profques->save();


	}

}