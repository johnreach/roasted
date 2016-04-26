<?php
/**
 * @file    Controllers/HomeController.php
 *
 * @brief   Responsible for delivering home views
 * 
 * @author  John Reach
 */
namespace Roasted\Controllers;

use \Roasted\Controllers\Controller;
use \Roasted\Models\User;

class HomeController extends Controller {
    
    public function index($request, $response) {
        
        $user = User::find_one(1);
        return $this->view->render($response, 'index.html');
    }
  
}