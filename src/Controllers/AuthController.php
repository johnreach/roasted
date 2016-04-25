<?php
/**
 * @file    Controllers/AuthController.php
 *
 * @brief   Authentication controller for delivering views
 *          and handling registration and authentication
 *          related request.
 * 
 * @author  John Reach
 */
namespace Roasted\Controllers;

use \Roasted\Controllers\Controller;

class AuthController extends Controller {
    
    public function getRegister($request, $response) {
        
        return $this->view->render($response, 'register.twig');
    }
    
    public function getLogin($request, $response) {
        
        return $this->view->render($response, 'login.twig');
    }
    
}