<?php

namespace App\Repositories;

interface ProfilequestionsRepositoryInterface
{

    public function add($profilequestion);
    public function delete($id);
    public function modify($id,$profilequestion);

}