<?php

// Application middleware
$app->add(new Roasted\Middleware\ValidationErrors($container));
$app->add(new Roasted\Middleware\PersistInput($container));
$app->add(new Roasted\Middleware\CsrfView($container));
$app->add($container->csrf);