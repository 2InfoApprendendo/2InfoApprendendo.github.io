<?php
/**
 * Aula sobre Métodos em PHP — Exemplo de uso da classe Usuario
 * Demonstra como instanciar a classe e utilizar seus métodos.
 */

require_once 'Usuario.php';

// Cria um novo usuário
$usuario = new Usuario();

// Define os dados do usuário
$usuario->setId(1);
$usuario->setLogin('meu_login');
$usuario->setSenha('minha_senha_secreta');

// Exibe os dados definidos
echo "ID: " . $usuario->getId() . "<br/>";
echo "Login: " . $usuario->getLogin() . "<br/>";

// Verifica se a senha informada está correta
if ($usuario->verificarSenha('minha_senha_secreta')) {
    echo "Senha correta!";
} else {
    echo "Senha incorreta!";
}
?>
