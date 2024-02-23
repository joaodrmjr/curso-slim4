<?php

namespace App\Auth;


use App\Models\User;


class Auth {


	const NONE = 0;
	const LOGGED = 1;
	const ADMIN = 2;

	protected $container;

	protected $state, $user;

	public function __construct($container)
	{
		$this->container = $container;

		// estado da sessao
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