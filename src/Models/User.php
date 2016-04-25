<?php
/**
 * @file    Models/User.php
 *
 * @brief   User model represented by database table 'user'
 *          using j4mie/paris ORM
 * 
 * @author  John Reach
 */
namespace Roasted\Models;

use Model;

class User extends Model {
    
    public static $_table_use_short_name = true;
    
    public function getPhoto() {
        
        return $this->has_one('Photo');
    }
    
    public function getComments() {
        
        return $this->has_many('Comment');
    }
    
}