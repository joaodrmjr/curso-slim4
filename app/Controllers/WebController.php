<?php


namespace App\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



class WebController extends Controller {


	public function home(Request $request, Response $response)
	{
		return $this->view->render($response, "home.twig");
	}

}