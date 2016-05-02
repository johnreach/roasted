<?php
/**
 * @file    Controllers/AuthController.php
 *
 * @brief   Authentication controller for delivering views
 *          and handling registration and authentication
 *          related request.
 * 
 * @author  Jacob Goodwin
 */
namespace Roasted\Controllers;

use Roasted\Auth\Auth;
use Roasted\Models\Photo;
use Roasted\Models\User;
use Roasted\Controllers\Controller;
use Respect\Validation\Validator as v;

class UploadController extends Controller {
    
    public function getUpload($request, $response) {
        
        return $this->view->render($response, "uploadForm.twig");
    }
    
    public function postUpload($request, $response) {
        
        // Pass the request and the rules that we want to check for into
        // the validator 'validate' method.
        
        if($this->auth->checkLogin()) {
        
            $photo = Photo::create();
            $photo->username   = $this->auth->getUser()->username;
            $photo->uuid_url   = $request->getParam('uuid');
            $photo->date       = date("Y-m-d H:i:s");
            $photo->title      = $request->getParam('title');
            
            $user = User::where('username', $this->auth->getUser()->username)->find_one();
            $user->role = "roastee";
            $user->save();
            $photo->save();

            return $response->withRedirect($this->router->pathFor('index'));

        }
        
        return $response->withRedirect($this->router->pathFor('register'));
    }
    
}