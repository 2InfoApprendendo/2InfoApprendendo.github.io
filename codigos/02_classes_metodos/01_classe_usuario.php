<?php
/**
 * Aula sobre Métodos em PHP — Definição da classe Usuario
 * Esta classe demonstra encapsulamento e manipulação segura de dados sensíveis.
 */

class Usuario {
    // Atributos privados (não acessíveis diretamente de fora da classe)
    private $id;
    private $login;
    private $senha;

    // Define o login do usuário (ex: e-mail ou nome de usuário)
    public function setLogin($login) {
        $this->login = $login;
    }

    // Retorna o login do usuário
    public function getLogin() {
        return $this->login;
    }

    // Define a senha do usuário, aplicando criptografia com password_hash
    public function setSenha($senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    // Verifica se a senha fornecida corresponde à senha armazenada
    public function verificarSenha($senha) {
        return password_verify($senha, $this->senha);
    }

    // Define o ID do usuário
    public function setId($id) {
        $this->id = $id;
    }

    // Retorna o ID do usuário
    public function getId() {
        return $this->id;
    }
}
?>
