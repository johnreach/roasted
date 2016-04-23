<?php
// Routes

require_once('UserController.php');
 
$app->get('/', function ($request, $response, $args) {
    
    return $this->view->render($response, 'index.html', $args);
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
    
    $username = null;
    
    $user = new UserController();
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
