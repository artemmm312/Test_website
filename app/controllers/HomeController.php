<?php

namespace App\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
	public function home(Request $request, Response $response): Response
	{
		return $this->view->render($response, 'form.html');
	}
}
