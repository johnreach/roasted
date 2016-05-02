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
use \Roasted\Models\Comments;

class PhotoController extends Controller {
    
    public function getPhoto($request, $response, $args) {
        
        $this->view->getEnvironment()->addGlobal('photo', 
            Photo::find_one($args['photo_id']));
                
        $this->view->getEnvironment()->addGlobal('comments',
            $this->CommentController->getComments($args['photo_id']));
        
        return $this->view->render($response, 'view_photo.twig');
    }
    
    public function getPhotos($request, $response) {
        
         $this->view->getEnvironment()->addGlobal('photo', 
            Photo::find_array());
        
        //return $this->view->render($response, 'index.html');
        
    }
    
    public function getComments() {
        
        return Comments::has_many()->find_array();
    }
    
    public function getCommentsCount() {
        
        return Comments::has_many()->count();;
    }
}   


  