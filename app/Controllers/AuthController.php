<?php



namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class AuthController extends Controller {


	public function loginPage(Request $request, Response $response)
	{
		return $this->view->render($response, "auth/login.twig");
	}


	public function registerPage(Request $request, Response $response)
	{
		return $this->view->render($response, "auth/register.twig");
	}

}