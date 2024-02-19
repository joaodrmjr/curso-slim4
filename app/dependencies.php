<?php


use Psr\Container\ContainerInterface;

use Slim\Views\Twig;
use Illuminate\Database\Capsule\Manager as Capsule;

return function (ContainerInterface $container) {

	// banco de dados
	$capsule = new Capsule();
	$capsule->addConnection($container->get("settings")["database"]);
	$capsule->setAsGlobal();
	$capsule->bootEloquent();

	$container->set("db", function ($container) use ($capsule) {
		return $capsule;
	});
	// ---------------------------------


	$container->set("view", function ($container) {
		$config = $container->get("settings");
		return Twig::create($config["view"]["template_path"], $config["view"]["twig"]);
	});



	$container->set("WebController", function ($container) {
		return new App\Controllers\WebController($container);
	});

};