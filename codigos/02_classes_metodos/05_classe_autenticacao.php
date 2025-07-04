<?php
/**
 * Aula sobre Métodos em PHP — Sistema de Autenticação
 * Esta classe gerencia usuários, autenticação e funcionalidades adicionais.
 */
uj
require_once 'Usuario.php'; // Garante que a classe Usuario esteja disponível

class SistemaAutenticacao {
    private $usuarios = [];

    // Adiciona um novo usuário ao sistema
    public function adicionarUsuario(Usuario $usuario) {
        $this->usuarios[] = $usuario;
    }

    // Autentica um usuário com base no login e senha
    public function autenticar($login, $senha) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getLogin() === $login && $usuario->verificarSenha($senha)) {
                return true;
            }
        }
        return false;
    }

    // Retorna todos os usuários cadastrados
    public function listarUsuarios() {
        return $this->usuarios;
    }

    // Remove um usuário com base no ID
    public function removerUsuario($id) {
        foreach ($this->usuarios as $key => $usuario) {
            if ($usuario->getId() === $id) {
                unset($this->usuarios[$key]);
                return true;
            }
        }
        return false;
    }

    // Redefine a senha de um usuário com base no ID
    public function redefinirSenha($id, $novaSenha) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getId() === $id) {
                $usuario->setSenha($novaSenha);
                return true;
            }
        }
        return false;
    }

    // Verifica se o usuário tem permissão para uma ação (exemplo simplificado)
    public function verificarPermissao($id, $acao) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getId() === $id) {
                // Aqui poderia haver lógica real de permissões
                return true;
            }
        }
        return false;
    }
}
?>
