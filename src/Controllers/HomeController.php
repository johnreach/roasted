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
use \Roasted\Controllers\PhotoController;
use \Roasted\Models\Photo;

class HomeController extends Controller {
    
    public function index($request, $response) {
        
        $this->view->getEnvironment()->addGlobal('photos', 
            Photo::where('username', 'tester')->find_array());
        
        return $this->view->render($response, 'index.html');
    }
    
}