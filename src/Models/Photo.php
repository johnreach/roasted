<?php
/**
 * @file    Models/Photo.php
 *
 * @brief   Phto model represented by database table 'photo'
 *          using j4mie/paris ORM
 * 
 * @author  John Reach
 */
namespace Roasted\Models;

use Model;
use \Roasted\Models\Comment;

class Photo extends Model {
    
    public static $_table_use_short_name = true;
    
    public function owner() {
        
        return $this->has_one('User');
    }
}