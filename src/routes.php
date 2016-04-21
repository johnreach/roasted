<?php
// Routes

require_once('UserController.php');
 
$app->get('/', function ($request, $response, $args) {
    
    return $this->view->render($response, 'login_form.html', $args);
});

$app->get('/register', function ($request, $response, $args) {
    
    return $this->view->render($response, 'register_form.html', $args);
});

$app->post('/register', function ($request, $response, $args) {
    
    $body = $request->getParsedBody();
    $view = 'register_form.html';
    $user = new UserController();
    
    $unique_user = $user->uniqueName($body['username']);
    $pass_match  = $user->passwordsMatch($body['password1'], $body['password2']);
    
    if($unique_user && $pass_match) {
        
        $user->addUser($body['username'], $body['password1']);
        $view = 'register_success.html';
    }
    
    return $this->view->render($response, $view, [
            'username'    => $body['username'],
            'uniqueUser' => !$unique_user,
            'passMatch'  => !$pass_match
        ]);
});

$app->get('/login', function ($request, $response, $args) {
    
    return $this->view->render($response, 'login_form.html', $args);
});

$app->post('/login', function ($request, $response, $args) {
    
    $body = $request->getParsedBody();
    $view = 'login_form.html';
    $username = $body['username'];
    $password = $body['password'];
    
    $user = new UserController();
    
    if($user->login($username, $password)) {
        
        $view = 'register_success.html';
        $args = ['username' => $username];
        
    } else {
         
        $args = [ 'message' => "Incorrect credentials"];
    }
    
    return $this->view->render($response, $view, $args);
});