<?php
/**
 * @brief   Add a new entry to the binary tree list
 *
 *          Navigates through the tree to print to outfile
 *          in correct order. Compares newNode to the root,
 *          then chooses the correct path to take. Starts
 *          recusion over
 *
 * @param   currentRoot     node to start navigation
 *          newNode         pointer to add to the tree
 *
 * @return  none
 */

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../');

require_once('../vendor/autoload.php');
require_once('../database-settings.php');

class User extends Model {
    
    public static $_table_use_short_name = true;
    
}