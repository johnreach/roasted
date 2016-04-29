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
namespace Roasted\Controllers\Auth;

use Roasted\Auth\Auth;
use Roasted\Models\User;
use Roasted\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends Controller {
    
    public function getRegister($request, $response) {
        
        return $this->view->render($response, "registerForm.twig");
    }
    
    public function postRegister($request, $response) {
        
        // Pass the request and the rules that we want to check for into
        // the validator 'validate' method.
        
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->uniqueEmail(),
            'username' => v::notEmpty()->uniqueUsername(),
            'password' => v::noWhitespace()->notEmpty(),
            'password2' => v::equals(v::key('password'))->setTemplate('Passwords must match'),
        ]);
        
        if(!$validation->failed()) {
        
            $user = User::create();
            $user->email    = $request->getParam('email');
            $user->username = $request->getParam('username');
            $user->password = password_hash($request->getParam('password'), PASSWORD_BCRYPT);
            $user->role     = 'member';
            $user->save();

            $this->auth->attemptLogin($user->email, $request->getParam('password'));
            //$this->view->getEnvironment->addGlobal('accountCreated', true);
            return $response->withRedirect($this->router->pathFor('register'));

        }
        
        return $response->withRedirect($this->router->pathFor('register'));
    }
    
    
    public function getLogin($request, $response) {
        
        return $this->view->render($response, 'index.html');
    }
    
    public function postLogin($request, $response) {
        
        $this->auth->attemptLogin(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if(!$auth)
            $_SESSION['validationErrors']['loginFailed'] = true;
        
        return $response->withRedirect($this->router->pathFor('index'));
    }
    
    public function getLogout($request, $response) {
        
        $this->auth->logout();
        
        return $response->withRedirect($this->router->pathFor('index'));
    }
    
}