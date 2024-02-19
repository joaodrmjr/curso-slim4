<?php


use Slim\App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return function (App $app) {

	$app->get("/", function (Request $request, Response $response, $args) {
		return $this->get("view")->render($response, "home.twig");
	});

};