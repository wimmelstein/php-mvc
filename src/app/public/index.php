<?php
require_once dirname(__FILE__) . '/../bootstrap.php';

use app\controllers\ApiController;
use wimmelsoft\core\Application;

$app = new Application(__DIR__, Bootstrap::getConfig());

$app->router->get('/', 'home');
$app->router->get('/about', 'about');
$app->router->get('/users', 'users');
$app->router->get('/api/users', [ApiController::class, 'getOneUser']);
$app->run();

