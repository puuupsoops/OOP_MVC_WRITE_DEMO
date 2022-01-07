<?php
use App\Core\Models\Route;

session_start();
spl_autoload_register(function ($class) {
    $path = str_replace('\\','/', $class . '.php');
    if(file_exists($path))
        require_once $path;
});

if(!\Environment::IS_PRODUCTION)
    require_once 'app/core/services/dev.php';

App\Core\App::getInstance()->setRoutes([
    new Route(
        '/auth',
        \App\Controllers\UserController::class . ':Authorization'
    ),
    new Route(
        '/personal',
        \App\Controllers\UserController::class . ':Personal'
    ),
    new Route(
        '/registration',
        \App\Controllers\UserController::class . ':Registration'
    )
]);

App\Core\App::getInstance()->run();