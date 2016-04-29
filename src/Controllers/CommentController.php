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
use \Roasted\Models\Comment;
use \Roasted\Models\User;

class CommentController extends Controller {
    
    public function postComment($request, $response) {
        
        if($this->auth->checkLogin()) {
            $comment = Comment::create();
            $comment->username   = $this->auth->getUser()->username;
            $comment->photo_id   = $request->getParam('photo_id');
            $comment->cmt        = $request->getParam('cmt');
            $comment->parent_id  = $request->getParam('parent_id');
            $comment->date       = date("Y-m-d H:i:s");
            $comment->save();
        }
        
        return $response->withRedirect($this->router->pathFor('showPhoto', ['photo_id' => $comment->photo_id]));
    }
    
    public function getComments($photo_id) {
        
        $comments = Comment::where('photo_id', $photo_id)->find_array();
        
        return $comments;
    }
  
}