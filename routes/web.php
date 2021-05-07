<?php

use App\controllers\HomeController;
use App\controllers\CheckController;

/* $app->get('/', function(ServerRequestInterface $request,
ResponseInterface $response){
	return $this->get('view')->render($response, 'form.html');
}); */

$app->get('/', HomeController::class . ':home')->setName('root');
$app->post('/', CheckController::class . ':check')->setName('root');
