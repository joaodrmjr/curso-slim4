<?php



namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class AuthController extends Controller {


	public function loginPage(Request $request, Response $response)
	{
		return $this->view->render($response, "auth/login.twig");
	}


	public function postLogin(Request $request, Response $response)
	{

		$pass = $this->auth->loginAttemp($_POST);

		if (!$pass) {
			$this->flash->addMessage("error", $this->auth->error);
			return redirect($request, $response, "auth.login");
		}

		$this->flash->addMessage("success", "Login realizado com sucesso!");

		return redirect($request, $response, "home");
	}


	public function registerPage(Request $request, Response $response)
	{
		return $this->view->render($response, "auth/register.twig");
	}


	public function logout(Request $request, Response $response)
	{
		// desloga o usuario da sessao
		$this->flash->addMessage("info", "Sessão encerrada com sucesso!");
		$this->auth->logout();
		return redirect($request, $response, "auth.login");
	}

}