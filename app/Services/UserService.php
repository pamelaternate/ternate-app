<?php
namespace App\Services;

use Illuminate\Support\ServiceProvider;

class UserService {
    
    protected $users;

    public function __construct ($users){
        $this->users = $users;
    }
    public function listUsers(){
        return $this->users;
    }

};
