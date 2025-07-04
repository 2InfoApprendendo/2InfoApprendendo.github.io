<?php
/**
 * Exemplo de uso da classe SistemaAutenticacao
 * Demonstra como adicionar, autenticar, listar, remover e redefinir usuários.
 */

require_once 'SistemaAutenticacao.php';

// Cria o sistema de autenticação
$sistema = new SistemaAutenticacao();

// Cria e adiciona o primeiro usuário
$usuario1 = new Usuario();
$usuario1->setId(1);
$usuario1->setLogin('usuario1');
$usuario1->setSenha('senha1');
$sistema->adicionarUsuario($usuario1);

// Cria e adiciona o segundo usuário
$usuario2 = new Usuario();
$usuario2->setId(2);
$usuario2->setLogin('usuario2');
$usuario2->setSenha('senha2');
$sistema->adicionarUsuario($usuario2);

// Autentica os usuários
echo $sistema->autenticar('usuario1', 'senha1') ? "Usuário 1 autenticado com sucesso!<br/>" : "Falha na autenticação do usuário 1.<br/>";
echo $sistema->autenticar('usuario2', 'senha2') ? "Usuário 2 autenticado com sucesso!<br/>" : "Falha na autenticação do usuário 2.<br/>";

// Lista todos os usuários
echo "<h3>Usuários cadastrados:</h3>";
foreach ($sistema->listarUsuarios() as $usuario) {
    echo "Login: " . $usuario->getLogin() . "<br/>";
}

// Remove o usuário 1
if ($sistema->removerUsuario(1)) {
    echo "Usuário 1 removido com sucesso!<br/>";
}

// Lista novamente após remoção
echo "<h3>Usuários após remoção:</h3>";
foreach ($sistema->listarUsuarios() as $usuario) {
    echo "Login: " . $usuario->getLogin() . "<br/>";
}

// Redefine a senha do usuário 2
if ($sistema->redefinirSenha(2, 'novaSenhaSegura')) {
    echo "Senha do usuário 2 redefinida com sucesso!<br/>";
}

// Verifica permissão (exemplo simplificado)
if ($sistema->verificarPermissao(2, 'acessar_dashboard')) {
    echo "Usuário 2 tem permissão para acessar o dashboard.<br/>";
}
?>
