<?php

namespace App\controllers;

use App\Domain\Service\UserSelect;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UserSelectController
{
	private $userSelect;

	public function __construct(UserSelect $userSelect)
	{
		$this->userSelect = $userSelect;
	}

	public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
	{
		$result = $this->userSelect->User();
		$response->getBody()->write((string)json_encode($result));

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(201);
	}
}
