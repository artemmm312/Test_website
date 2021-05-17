<?php
// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['public'] = $settings['root'] . '/public';

// Error Handling Middleware settings
$settings['error'] = [
	'display_error_details' => true,
	'log_errors' => true,
	'log_error_details' => true,
];

$settings['twig'] = [
	'paths' => [
		__DIR__ . '/../views',
	],
	'options' => [
		'cache' => false,
	],
];

// Database settings
$settings['db'] = [
	'driver' => 'mysql',
	'host' => 'localhost',
	'username' => 'root',
	'database' => 'fp',
	'password' => '1111',
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_unicode_ci',
	'flags' => [
		PDO::ATTR_PERSISTENT => false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
	],
];

return $settings;
