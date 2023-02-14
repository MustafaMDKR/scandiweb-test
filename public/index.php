<?php

use Dotenv\Dotenv;
use app\controllers\ProductController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
  'db' => [
    'dsn' => $_ENV['DB_DSN'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS']
  ]
];

$app = new Application(dirname(__DIR__), $config);
$app->router->get('/', [ProductController::class, 'home']);
$app->router->post('/', [ProductController::class, 'home']);
$app->router->get('/add-product', [ProductController::class, 'addProduct']);
$app->router->post('/add-product', [ProductController::class, 'addProduct']);

$app->run();
