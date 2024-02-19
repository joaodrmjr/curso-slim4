<?php


use Psr\Container\ContainerInterface;

use Slim\Views\Twig;


return function (ContainerInterface $container) {


	$container->set("view", function ($container) {
		$config = $container->get("settings");
		return Twig::create($config["view"]["template_path"], $config["view"]["twig"]);
	});



	$container->set("WebController", function ($container) {
		return new App\Controllers\WebController($container);
	});

};