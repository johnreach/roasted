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

class HomeController extends Controller {
    
    public function index($request, $response) {
        
        return $this->view->render($response, 'index.html');
    }
  
}