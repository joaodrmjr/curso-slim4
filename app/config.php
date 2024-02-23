<?php


use Psr\Container\ContainerInterface;

return function (ContainerInterface $container) {
	$container->set("settings", function () {
		return [
			"displayErrorDetails" => true,

			// View Settings
			"view" => [
				"template_path" => __DIR__ . "/../resources/views",
				"twig" => [
					"cache" => __DIR__ . "/../cache/twig",
					"debug" => true,
					"auto_reload" => true
				]
			],

			// database
			"database" => [
				'driver' => 'mysql',
			    'host' => 'localhost',
			    'database' => 'curso-slim4',
			    'username' => 'root',
			    'password' => '',
			    'charset' => 'utf8',
			    'collation' => 'utf8_unicode_ci',
			    'prefix' => ''
			],

			"auth" => [
				"session" => "user_id",
				"remember" => "user_r"
			]
		];
	});
};