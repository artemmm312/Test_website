<?php

namespace App\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class HomeController
{
	private $twig;

	public function __construct(Twig $twig)
	{
		$this->twig = $twig;
	}

	public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
	{
		return $this->twig->render($response, 'form.html');
	}
}
