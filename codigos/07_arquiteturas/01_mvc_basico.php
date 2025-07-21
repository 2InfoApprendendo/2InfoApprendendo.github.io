<?php
// Model
class UsuarioModel {
    public function getDados() {
        return ["João", "Maria", "Pedro"];
    }
}

// View
class UsuarioView {
    public function mostrarUsuarios($usuarios) {
        foreach ($usuarios as $usuario) {
            echo $usuario . "<br>";
        }
    }
}

// Controller
class UsuarioController {
    public function index() {
        $model = new UsuarioModel();
        $view = new UsuarioView();
        $dados = $model->getDados();
        $view->mostrarUsuarios($dados);
    }
}

// Execução
$controller = new UsuarioController();
$controller->index();
?>