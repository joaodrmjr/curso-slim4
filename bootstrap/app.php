<?php



use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;



require __DIR__ . "/../vendor/autoload.php";


$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();


$app->addErrorMiddleware(true, false, false);


$app->get("/", function (Request $request, Response $response, $args) {
	$response->getBody()->write("Ola Mundo!");
	return $response;
});