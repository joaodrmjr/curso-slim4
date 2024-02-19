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
			]
		];
	});
};