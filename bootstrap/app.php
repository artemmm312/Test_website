<?php

use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Selective\BasePath\BasePathMiddleware;
use Slim\Middleware\ErrorMiddleware;

require __DIR__ . '/../vendor/autoload.php';
require 'container.php';

$app = AppFactory::create();
//$app->setBasePath('/Test_website');

$app->addRoutingMiddleware();
$app->add(TwigMiddleware::createFromContainer($app));
$app->add(new BasePathMiddleware($app));

$middlewareError = new ErrorMiddleware(
	$app->getCallableResolver(),
	$app->getResponseFactory(),
	true, // Этот параметр отвечает за подробный вывод ошибок
	false, // Логирование ошибок
	false // Логирование подробностей ошибок
);
$app->add($middlewareError);
