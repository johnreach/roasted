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
use \Roasted\Models\Photo;

class PhotoController extends Controller {
    
    public function getPhoto($response, $response, $args) {
        
        $this->view->getEnvironment()->addGlobal('photo', 
            Photo::find_array('id', $args['photo_id']));
                
        $this->view->getEnvironment()->addGlobal('comments',
            $this->CommentController->getComments($args['photo_id']));
        
        return $this->view->render($response, 'view_photo.twig');
    }
}   


  