<?php
// Routes
$app->get('/', 'HomeController:index')->setName('index');

$app->get('/register', 'AuthController:getRegister')->setName('register');
$app->post('/register', 'AuthController:postRegister');

$app->get('/login', 'AuthController:getLogin')->setName('login');
$app->post('/login', 'AuthController:postLogin');

$app->get('/upload', 'UploadController:getUpload')->setName('upload');
$app->post('/upload', 'UploadController:postUpload');