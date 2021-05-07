<?php

namespace App\models;

use Psr\Container\ContainerInterface;

abstract class Model
{
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function __get($property)
	{
		if ($this->container->has($property)) {
			return $this->container->get($property);
		}

		return null;
	}
}
