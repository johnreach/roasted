<?php
// Routes
$app->get('/', 'HomeController:index')->setName('index');

$app->get('/register', 'AuthController:getRegister')->setName('register');
$app->post('/register', 'AuthController:postRegister');

$app->get('/login', 'HomeController:index');
$app->post('/login', 'AuthController:postLogin')->setName('login');

$app->get('/logout', 'AuthController:getLogout')->setName('logout');

$app->get('/upload', 'UploadController:getUpload')->setName('upload');
$app->post('/upload', 'UploadController:postUpload');

$app->get('/photo/{photo_id}', 'PhotoController:getPhoto')->setName('showPhoto');
$app->get('/photos/{photo_count}', 'PhotoController:getPhotos')->setName('showPhotos');

$app->get('/comments/{user_id}', 'CommentController:getUserComments')->setName('userComments');
$app->post('/photo/{photo_id}', 'CommentController:postComment')->setName('postComment');