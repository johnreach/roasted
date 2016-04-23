<?php

require_once('models/User.php');

use JeremyKendall\Password\PasswordValidator;
use JeremyKendall\Slim\Auth\Adapter\Db\PdoAdapter;
use JeremyKendall\Slim\Auth\Bootstrap;

class UserController {
    
    function uniqueName($username) {
        
        $user = Model::factory('User')->where_equal('username', $username)->find_one();
        
        return !$user;
    }
    
    function passwordsMatch($pass1, $pass2) {
        
        return strcmp($pass1, $pass2) == 0;
    }
    
    function addUser($username, $password) {
        
        $user = Model::factory('User')->create();
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->role     = "member";
        $user->created  = time();
        
        $user->save();
    }
    
    function login($username, $password) {
        
        return $app->authenticator->authenticate($username, $password);
    }
    
}

