<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {

/* 	$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
		$response->getBody()->write('Hello, World!');
		return $response;
	}); */

	$app->get('/', \App\controllers\HomeController::class);
	$app->post('/', \App\controllers\UserSelectController::class);
};
