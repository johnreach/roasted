<?php
// Routes
$app->get('/', 'HomeController:index')->setName('index');

$app->get('/register', 'AuthController:getRegister')->setName('register');
$app->post('/register', 'AuthController:postRegister');

$app->get('/login', 'AuthController:getLogin')->setName('login');
$app->post('/login', 'AuthController:postLogin');

/*
$app->post('/register', function ($request, $response, $args) {
    
    $body = $request->getParsedBody();
    $view = 'register_form.html';
    $user = new Controllers\UserController;
    
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
    
    $username = null;
    
    $user = new Controllers\UserController;
    $body = $request->getParsedBody();

    $username = $body['username'];
    $password = $body['password'];
    
    $result = $user->login($username, $password);

    if ($result->isValid()) {
        
        $view = 'register_success.html';

    } else {
        
        $messages = $result->getMessages();
        $app->flashNow('error', $messages[0]);
        $app->redirect('/login');
    }

    $this->view->render($response, 'register_success.html', array('username' => $username));
    
})->setName('login');
*/
