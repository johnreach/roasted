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
use \Roasted\Models\Comment;

class HomeController extends Controller {
    
    public function index($request, $response) {
        
        $photos = Photo::find_array();
  
        
        $this->view->getEnvironment()->addGlobal('photos', 
            $photos);
        
        return $this->view->render($response, 'index.html');
    }
    
}