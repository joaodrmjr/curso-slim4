<?php


use Slim\App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return function (App $app) {

	$app->get("/", "WebController:home")->setName("home");


	$app->group("/auth", function ($app) {

		$app->get("/login", "AuthController:loginPage")->setName("auth.login");


		$app->get("/register", "AuthController:registerPage")->setName("auth.register");

		// teste
		$app->get("/loga", "AuthController:loga")->setName("loga");

	});

	$app->group("/user", function ($app) {

		$app->get("/logout", "AuthController:logout")->setName("user.logout");

	});

};