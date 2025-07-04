<?php

class Pessoa {
    protected $nome;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }
}

class Aluno extends Pessoa {
    private $matricula;

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getMatricula() {
        return $this->matricula;
    }
}
