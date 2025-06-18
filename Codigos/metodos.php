<?php

class Usuario {
	// Atributos (variáveis) privados da minha classe
	private $id;
	private $login;
	private $senha;
	
	// Pego a informação registrada do login do usuário (seja um e-mail ou username)
	public function getLogin(){
		return $this->login;
	}

	// Informo uma mudança de senha, usando a função password_hash e indicando que ela será criptografada
	public function setSenha($senha){
		$this->senha = password_hash($senha, PASSWORD_DEFAULT);
	}
}