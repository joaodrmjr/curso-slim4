<?php



use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\Views\Twig;



require __DIR__ . "/../vendor/autoload.php";


$container = new Container();

AppFactory::setContainer($container);


// configuracoes
$config = require __DIR__ . "/../app/config.php";
$config($container);


$dependencies = require __DIR__ . "/../app/dependencies.php";
$dependencies($container);


$app = AppFactory::create();


// middlewares

$middleware = require __DIR__ . "/../app/middleware.php";
$middleware($app);


// rotas

$routes = require __DIR__ . "/../app/routes.php";
$routes($app);