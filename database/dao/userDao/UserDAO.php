<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2017
 * Time: 8:54 PM
 */

use App\User;

class UserDAO
{

    public function getUserByUsername($username){
        return User::where('username', $username);
    }




}