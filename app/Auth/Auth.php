<?php

namespace App\Auth;


use App\Models\User;


class Auth {


	const NONE = 0;
	const LOGGED = 1;
	const ADMIN = 2;

	protected $container, $configs;

	protected $state, $user;

	public $error, $obj;

	public function __construct($container)
	{
		$this->container = $container;
		$this->configs = $container->get("settings")["auth"];

		// estado da sessao
		$this->check();
	}


	public function loginAttemp(array $params): bool
	{
		if (empty($params["username"]) || empty($params["password"])) {
			$this->error = "Preencha todos os campos";
			return false;
		}
		if (!$user = User::where("username", $params["username"])->orWhere("email", $params["username"])->first()) {
			$this->error = "Dados inseridos invalidos";
			return false;
		}
		if (!password_verify($params["password"], $user->password)) {
			$this->error = "Dados inseridos invalidos";
			return false;
		}

		// loga o usuario
		$this->login($user);

		return true;
	}

	private function login(User $user): void
	{
		$_SESSION[$this->configs["session"]] = $user->id;
		$this->state = $user->admin ? self::ADMIN : self::LOGGED;
		$this->user = $user;

		// remember
	}


	public function logout(): void
	{
		unset($_SESSION[$this->configs["session"]]);
		$this->state = self::NONE;
		$this->user = null;
	}

	private function check(): void
	{
		$session = $_SESSION[$this->configs["session"]] ?? null;

		if ($session && $user = User::find($session)) {

			$this->user = $user;
			$this->state = $user->admin ? self::ADMIN : self::LOGGED;
			return;
		}

		$this->state = self::NONE;
	}


	//retorna a estado da sessao (NONE/LOGGED/ADMIN)
	public function state(): int
	{
		return $this->state;
	}


	// retorna o usuario logado ou entao retorna nulo
	public function user(): ?User
	{
		return $this->user;
	}

}