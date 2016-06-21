<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements  UserRepositoryInterface
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }
    
    
    
}
