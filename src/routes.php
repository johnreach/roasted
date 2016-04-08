<?php
// Routes
 
$app->get('/[{name}]', function ($request, $response, $args) {
    
    return $this->view->render($response, 'index.html', $args);
});