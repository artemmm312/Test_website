<?php

namespace App\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\models\CheckModel;

class CheckController extends Controller
{
	public function check(Request $request, Response $response): Response
	{
		$model = new CheckModel;
		$result = $model->checkUser();
		$response->getBody()->write(json_encode($result));
		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
