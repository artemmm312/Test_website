<?php

use Selective\BasePath\BasePathMiddleware;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\TwigMiddleware;

return function (App $app) {
	// Parse json, form data and xml
	$app->addBodyParsingMiddleware();

	$app->add(TwigMiddleware::class);

	$app->addRoutingMiddleware();

	$app->add(BasePathMiddleware::class);

	$app->add(ErrorMiddleware::class);
};
