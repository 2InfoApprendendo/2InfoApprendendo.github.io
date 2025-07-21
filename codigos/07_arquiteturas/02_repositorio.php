<?php
interface RepositorioUsuario {
    public function getTodos();
}

class UsuarioRepositorioMySQL implements RepositorioUsuario {
    public function getTodos() {
        // Simulação de dados do banco
        return ["Carlos", "Ana", "Lucas"];
    }
}

class UsuarioController {
    private $repositorio;
    
    public function __construct(RepositorioUsuario $repo) {
        $this->repositorio = $repo;
    }
    
    public function listar() {
        $dados = $this->repositorio->getTodos();
        print_r($dados);
    }
}

// Uso
$controller = new UsuarioController(new UsuarioRepositorioMySQL());
$controller->listar();
?>