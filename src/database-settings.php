<?php
use JeremyKendall\Password\PasswordValidator;
use JeremyKendall\Slim\Auth\Adapter\Db\PdoAdapter;
use JeremyKendall\Slim\Auth\Bootstrap;

ORM::configure('mysql:host=localhost;dbname=roasted');
ORM::configure('username', 'root');
ORM::configure('password', 'causeytestarehard');

$db = ORM::get_db();
$adapter = new PdoAdapter(
    $db, 
    'user', 
    'username', 
    'password', 
    new PasswordValidator()
);

//$acl = new \ZendAcl\Acl();
//$authBootstrap = new Bootstrap($app, $adapter, $acl);
//$authBootstrap->bootstrap();