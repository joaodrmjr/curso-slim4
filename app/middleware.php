<?php

use Slim\App;
use Slim\Views\TwigMiddleware;

return function (App $app) {

	$config = $app->getContainer()->get("settings");


	$app->addErrorMiddleware($config["displayErrorDetails"], false, false);

	// twig view middleware
	$app->add(TwigMiddleware::createFromContainer($app));


};