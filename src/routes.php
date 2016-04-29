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