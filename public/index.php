<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\ProductController;
use app\core\Application;



$app = new Application(dirname(__DIR__));
$app->router->get('/', [ProductController::class, 'home']);
$app->router->post('/', [ProductController::class, 'home']);
$app->router->get('/add-product', [ProductController::class, 'addProduct']);
$app->router->post('/add-product', [ProductController::class, 'addProduct']);

$app->run();
