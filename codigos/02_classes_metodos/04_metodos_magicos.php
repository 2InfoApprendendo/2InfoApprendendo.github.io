<?php

class Produto {
    private $nome;
    private $preco;

    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function __toString() {
        return "Produto: $this->nome - R$ $this->preco";
    }
}

$p = new Produto("Caneta", 2.5);
echo $p;
// Saída: Produto: Caneta - R$ 2.5

class Usuario {
    private $nome;
    private $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function __toString() {
        return "Usuário: $this->nome - Email: $this->email";
    }
}

?>