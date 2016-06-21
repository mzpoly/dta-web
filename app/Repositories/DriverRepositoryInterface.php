<?php

namespace App\Repositories;

interface DriverRepositoryInterface
{

    public function add($fblogin,$email,$profilequestions);
    public function delete($fblogin);
    public function modifyEmail($fblogin,$email);
    public function modifyProfileQuestions($fblogin,$profilequestions);
}