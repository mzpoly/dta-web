<?php

namespace App\Repositories;

interface AdminRepositoryInterface
{
    public function add($login,$password);
    public function delete($login);
    public function modify($login,$password);
    public function checkPassword($login,$password);
    
}
