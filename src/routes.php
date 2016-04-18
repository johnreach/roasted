<?php
// Routes

require_once('data_controller.php');
 
$app->get('/', function ($request, $response, $args) {
    
    return $this->view->render($response, 'login_form.html', $args);
});

$app->get('/register', function ($request, $response, $args) {
    
    return $this->view->render($response, 'register_form.html', $args);
});

$app->post('/register', function ($request, $response, $args) {
    
    $body = $request->getParsedBody();
    $view = 'register_form.html';
    
    $unique_user = uniqueUser($body['username']);
    $pass_match  = passwordsMatch($body['password1'], $body['password2']);
    
    if($unique_user && $pass_match) {
        
        addUser($body['username'], $body['password1']);
        $view = 'register_success.html';
    }
    
    return $this->view->render($response, $view, [
            'username'    => $body['username'],
            'uniqueUser' => !$unique_user,
            'passMatch'  => !$pass_match
        ]);
});