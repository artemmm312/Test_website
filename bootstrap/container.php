<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

$container = new Container();
AppFactory::setContainer($container);

$container->set('view', function () {
	return Twig::create(__DIR__ . '/../views', ['cache' => false]);
});

/* 
$container->set('db', function () {
	$host = 'localhost';
	$database = 'fp';
	$user = 'root';
	$password = '1111';
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$dsn = "mysql:host=$host;dbname=$database";
	return new PDO($dsn, $user, $password, $opt);
}); */
