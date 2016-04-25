<?php
/**
 * @file    Models/Comment.php
 *
 * @brief   Comment model represented by database table 'comment'
 *          using j4mie/paris ORM
 * 
 * @author  John Reach
 */
namespace Roasted\Models;

use Model;

class Comment extends Model {
    
    public static $_table_use_short_name = true;
    
    public function getUser() {
        
        return $this->has_one('User');
    }
    
    public function getPhoto() {
        
        return $this->belongs_to('Photo');
    }
    
    public function getParent() {
        
        return $this->belongs_to('Comment', 'parent');
    }
    
    public function getChildren() {
        
        return $this->has_many('Comment', 'parent');
    }
    
}