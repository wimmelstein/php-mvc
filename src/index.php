<?php

require_once('core\Application.php');
require_once('controllers\ApiController.php');

use app\core\Application;
use app\controllers\ApiController;

$config = [
    'db' => [
        'hostname' => 'db',
        'port' => 3306,
        'username' => 'root',
        'password' => 'mysql',
        'name' => 'inholland'
    ],
    'general' => [
        'applicationName' => 'Inholland API'
    ]
];

$app = new Application(__DIR__, $config);




$app->router->get('/', 'home');
$app->router->get('/about', 'about');
$app->router->get('/users', 'users');
$app->router->get('/api/users', [ApiController::class, 'getOneUser']);
$app->run();

