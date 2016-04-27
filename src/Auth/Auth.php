<?php

namespace Roasted\Auth;

use Roasted\Models\User;

class Auth {
    
    public function attemptLogin($email, $password) {
        
        $user = User::where('email', $email)->find_one();
        
        if(!$user)
            return false;
        
        if(password_verify($password, $user->password)) {
            
            $_SESSION['user'] = $user->id;
            
            return true;
        }
        
        return false;
    }
    
    public function checkLogin() {
        
        return isset($_SESSION['user']);
    }
    
    public function getUser() {
        
        return !$this->checkLogin() ?: User::find_one($_SESSION['user']);
    }
    
    public function logout() {
        
        unset($_SESSION['user']);
    }
    
}