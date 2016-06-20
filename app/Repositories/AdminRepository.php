<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminRepository implements  AdminRepositoryInterface
{

    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;

    }
    
    public function add($login, $password)
    {
        $admin = new $this->admin;
        $admin->login=$login;
        $admin->password=Hash::make($password);
        $admin->save();
    }
    
    public function delete($login)
    {
        $admin = Admin::where('login',$login);
        $admin->delete();
    }
    
    public function modify($login, $password)
    {
        $admin = Admin::where('login',$login);
        $admin->password=Hash::make($password);
        $admin->save();
    }

    public function checkPassword($login, $password)
    {

        $admin = Admin::where('login',$login)->first();
        if($admin){
        $hashedPassword =  $admin->password;
            if(Hash::check($password, $hashedPassword)){
                return true;
            }
        }
        return true;
    }
    
}
