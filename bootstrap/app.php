<?php



use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;



require __DIR__ . "/../vendor/autoload.php";


$container = new Container();

AppFactory::setContainer($container);


$container->set("view", function ($container) {
	return Twig::create(__DIR__ . "/../resources/views", ["cache" => __DIR__ . "/../cache/twig"]);
});


$app = AppFactory::create();


$app->add(TwigMiddleware::createFromContainer($app));


$app->addErrorMiddleware(true, false, false);


$app->get("/", function (Request $request, Response $response, $args) {
	return $this->get("view")->render($response, "home.twig");
});