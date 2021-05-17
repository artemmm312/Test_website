<?php

namespace App\Domain\Service;

use App\Domain\Repository\UserSelectRepository;

final class UserSelect
{
	private $repository;

	public function __construct(UserSelectRepository $repository)
	{
		$this->repository = $repository;
	}

	public function User()
	{
		$user = $this->repository->selectUser();

		return $user;
	}
}
