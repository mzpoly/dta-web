<?php

namespace App\Repositories;

interface ChoiceRepositoryInterface
{

    public function add($questionid,$answer,$choicenumber);
    public function remove($questionid,$choicenumber);
    public function modifyanswer($questionid, $answer, $choicenumber);
    public function getChoice($questionid,$choicenumber);

}