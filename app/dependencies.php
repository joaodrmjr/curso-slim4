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


	$container->set("auth", function ($container) {
		return new App\Auth\Auth($container);
	});


	$container->set("view", function ($container) {
		$config = $container->get("settings");

		$view = Twig::create($config["view"]["template_path"], $config["view"]["twig"]);


		$view->getEnvironment()->addGlobal("auth", [
			"state" => $container->get("auth")->state(),
			"user" => $container->get("auth")->user()
		]);

		return $view;
	});



	$container->set("WebController", function ($container) {
		return new App\Controllers\WebController($container);
	});
	$container->set("AuthController", function ($container) {
		return new App\Controllers\AuthController($container);
	});

};