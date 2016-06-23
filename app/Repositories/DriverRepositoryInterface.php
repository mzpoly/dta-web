<?php

namespace App\Repositories;

interface DriverRepositoryInterface
{

    public function add($fblogin,$email,$profilequestions,$date);
    public function delete($fblogin);
    public function modifyEmail($fblogin,$email);
    public function modifyProfileQuestions($fblogin,$profilequestions);
    public function getAllDrivers();
}