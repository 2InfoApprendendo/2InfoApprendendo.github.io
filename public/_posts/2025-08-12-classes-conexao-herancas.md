---
layout: post
title:  "Herança, Interfaces e Métodos Mágicos"
date:   2025-08-13 00:51:01 +0000
categories: php
---

Nesta aula, aprofundaremos a Programação Orientada a Objetos (POO) em PHP, mostrando como a herança permite criar hierarquias de classes, como interfaces garantem a consistência do código e como os métodos mágicos oferecem um controle poderoso sobre o comportamento dos objetos.

## Herança: A Reutilização Inteligente do Código
A herança é um dos pilares da POO. Ela nos permite criar uma nova classe (classe filha) que reutiliza atributos e métodos de uma classe existente (classe pai). A classe filha pode, então, adicionar suas próprias funcionalidades ou modificar as da classe pai. Isso promove a reutilização de código e a organização de classes em uma hierarquia lógica.

Exemplo: Vamos criar uma hierarquia de veículos. A classe Veiculo será a classe pai, e a classe Carro será a classe filha.

```php
<?php

// Classe Pai (superclasse)
class Veiculo {
    protected $velocidade = 0;

    public function acelerar($valor) {
        $this->velocidade += $valor;
        echo "Acelerando... Velocidade atual: " . $this->velocidade . " km/h.<br>";
    }

    public function frear($valor) {
        $this->velocidade -= $valor;
        if ($this->velocidade < 0) {
            $this->velocidade = 0;
        }
        echo "Freando... Velocidade atual: " . $this->velocidade . " km/h.<br>";
    }
}

// Classe Filha (subclasse) que herda de Veiculo
class Carro extends Veiculo {
    public $portas;

    public function __construct($portas) {
        $this->portas = $portas;
        echo "Um novo carro foi criado com " . $this->portas . " portas.<br>";
    }

    // O método acelerar() da classe Veiculo é reutilizado
    // O método frear() da classe Veiculo também é reutilizado
}

// Criando uma instância da classe Carro
$meuCarro = new Carro(4);
$meuCarro->acelerar(50);
$meuCarro->frear(20);

?>
```

A palavra-chave extends indica que a classe Carro herda de Veiculo.

A propriedade $velocidade é protected, o que significa que ela é acessível dentro da classe Veiculo e por suas classes filhas.

O método __construct é um método mágico (veremos mais sobre eles abaixo). Ele é chamado automaticamente quando um novo objeto é criado.

## Interfaces: Padronização e Contratos
Uma interface é como um "contrato". Ela define um conjunto de métodos que uma classe deve implementar. Uma classe que implementa uma interface deve obrigatoriamente fornecer a implementação para todos os métodos definidos na interface. Isso garante que diferentes classes, mesmo que sem herança, tenham a mesma "assinatura" de métodos, facilitando a interação e o polimorfismo.

Exemplo: Vamos criar uma interface Ajustavel para veículos que podem ter sua velocidade ajustada.

```php

<?php

// Definindo a interface
interface Ajustavel {
    public function aumentarVelocidade($valor);
    public function diminuirVelocidade($valor);
}

// Classe que implementa a interface
class Moto extends Veiculo implements Ajustavel {
    public function aumentarVelocidade($valor) {
        $this->acelerar($valor);
    }

    public function diminuirVelocidade($valor) {
        $this->frear($valor);
    }
}

// Criando uma instância da classe Moto
$minhaMoto = new Moto();
$minhaMoto->aumentarVelocidade(80);
$minhaMoto->diminuirVelocidade(30);

?>
```

A palavra-chave implements indica que a classe Moto está implementando a interface Ajustavel.

A classe Moto deve obrigatoriamente ter os métodos aumentarVelocidade() e diminuirVelocidade(), com a mesma assinatura da interface.

Isso permite que Moto e outras classes que implementarem Ajustavel possam ser tratadas de forma uniforme.

## Métodos Mágicos: Comportamentos Especiais
Métodos mágicos são métodos especiais que começam com dois underscores (__). Eles são acionados automaticamente pelo PHP em determinadas situações, permitindo que você controle o comportamento dos objetos.

Os mais comuns são:

`__construct()`: Chamado quando um objeto é criado. Perfeito para inicializar propriedades.

`__destruct()`: Chamado quando um objeto é destruído (por exemplo, quando o script termina). Útil para liberar recursos.

`__get($propriedade)`: Chamado quando você tenta acessar uma propriedade inacessível (ex: private).

`__set($propriedade, $valor)`: Chamado quando você tenta definir o valor de uma propriedade inacessível.

`__call($metodo, $argumentos)`: Chamado quando você tenta chamar um método que não existe.

`__toString()`: Chamado quando um objeto é tratado como uma string (ex: echo $objeto;). Deve retornar uma string.

Exemplo: Usando `__get`, `__set` e `__toString`

```php

<?php

class Usuario {
    private $nome;
    private $email;

    public function __set($propriedade, $valor) {
        if (property_exists($this, $propriedade)) {
            $this->$propriedade = $valor;
        } else {
            echo "Propriedade '{$propriedade}' não existe.<br>";
        }
    }

    public function __get($propriedade) {
        if (property_exists($this, $propriedade)) {
            return $this->$propriedade;
        }
        return null;
    }

    public function __toString() {
        return "Nome: {$this->nome}, Email: {$this->email}";
    }
}

$usuario = new Usuario();

// Usando o método mágico __set
$usuario->nome = "João";
$usuario->email = "joao@exemplo.com";

// Usando o método mágico __get
echo "Nome do usuário: " . $usuario->nome . "<br>"; // Saída: Nome do usuário: João

// Usando o método mágico __toString
echo "Detalhes do usuário: " . $usuario . "<br>"; // Saída: Detalhes do usuário: Nome: João, Email: joao@exemplo.com

?>
```

Com `__set`, podemos definir uma lógica para atribuir valores às propriedades privadas sem precisar de um setter para cada uma.

Com `__get`, podemos buscar o valor das propriedades privadas.

Com `__toString`, podemos controlar o que acontece quando o objeto é impresso.