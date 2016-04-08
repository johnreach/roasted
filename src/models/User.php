<?php
/**
 * @brief   User model represented by database table 'user'
 *          using j4mie/paris ORM
 * 
 * @author  John Reach
 */

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../');

require_once('../vendor/autoload.php');
require_once('database-settings.php');

class User extends Model {
    
    public static $_table_use_short_name = true;
    
}