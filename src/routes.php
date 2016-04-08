<?php
// Routes

require_once('data_controller.php');
 
$app->get('/', function ($request, $response, $args) {
    
    return $this->view->render($response, 'index.html', $args);
});

$app->get('/register', function ($request, $response, $args) {
    
    return $this->view->render($response, 'register_form.html', $args);
});

$app->post('/register', function ($request, $response, $args) {
    
    $body = $request->getParsedBody();
    $view = 'register_form.html';
    
    $args['unique-user'] = uniqueUser($body['username']);
    $args['pass-match']  = passwordsMatch($body['password1'], $body['password2']);
    
    $args['username'] = $username;
    
    if($args['unique-user'] && $args['pass-match']) {
        
        addUser($body['username'], $body['password1']);
        $view = 'register_success.html';
    }
    
    return $this->view->render($response, $view, $args);
});