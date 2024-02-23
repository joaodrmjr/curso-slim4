<?php

use Slim\Routing\RouteContext;



if (!function_exists("redirect")) {
	function redirect($req, $res, $route) {
		$routeParser = RouteContext::fromRequest($req)->getRouteParser();
		$url = $routeParser->urlFor($route);

		return $res->withHeader('Location', $url)->withStatus(302);
	}
}


if (!function_exists("teste")) {
	function teste() {
		echo "teste";
		die();
	}
}