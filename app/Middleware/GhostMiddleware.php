<?php


namespace App\Middleware;


use App\Auth\Auth;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as Handle;


class GhostMiddleware extends Middleware {


	public function __invoke(Request $request, Handle $handler): Response
	{
		$response = $handler->handle($request);

		if ($this->container->get("auth")->state() !== Auth::NONE) {
			$this->container->get("flash")->addMessage("info", "Acesso indevido :/");
			return redirect($request, $response, "home");
		}
		
		return $response;

	}

}