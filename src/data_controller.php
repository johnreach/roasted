<?php

require_once('models/User.php');

function uniqueUser($username) {
    
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
    $user->type     = "regular";
    $user->created  = time();
    
    $user->save();
}