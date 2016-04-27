<?php

// Application middleware
$app->add(new Roasted\Middleware\ValidationErrors($container));
$app->add(new Roasted\Middleware\PersistInput($container));