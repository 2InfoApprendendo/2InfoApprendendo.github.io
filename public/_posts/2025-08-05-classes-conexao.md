---
layout: post
title:  " POO (Programação Orientada a Objetos) com Conexão ao Banco de Dados"
date:   2025-08-05 00:51:01 +0000
categories: php
---

A Programação Orientada a Objetos (POO) é um paradigma de programação que organiza o código em objetos. Um objeto é uma representação de uma entidade do mundo real, que possui atributos (características) e métodos (comportamentos).

* Classe: É o "molde" ou "planta" para criar objetos.

* Objeto: É a "instância" concreta de uma classe.

## Exemplo de Classe
Vamos criar uma classe Animal.

```php

class Animal {
    public $nome;
    public $cor;

    public function __construct($nome, $cor) {
        $this->nome = $nome;
        $this->cor = $cor;
    }

    public function emitirSom() {
        return "Som de animal!";
    }
}
```

## Herança
Herança é um dos pilares da POO. Permite que uma classe (classe filha) herde atributos e métodos de outra (classe pai). Isso promove a reutilização de código e a organização.

Vamos criar uma classe Cachorro que herda de Animal.

```php

class Cachorro extends Animal {
    public function emitirSom() {
        // Sobreescreve o método da classe pai
        return "Au au!";
    }
}

// Criando um objeto
$cachorro = new Cachorro("Rex", "Marrom");
echo $cachorro->emitirSom(); // Saída: Au au!

```
## Conexão com o Banco de Dados usando PDO
O PDO (PHP Data Objects) é uma extensão do PHP que fornece uma interface leve e consistente para acessar bancos de dados. É a forma recomendada e mais segura de fazer a conexão.

### Criando a Classe de Conexão
Para manter o código organizado e reutilizável, vamos criar uma classe Database para gerenciar a conexão.

```php

class Database {
    private static $pdo;

    public static function conectar() {
        if (!self::$pdo) {
            $host = 'localhost';
            $db   = 'nome_do_banco';
            $user = 'usuario';
            $pass = 'senha';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        return self::$pdo;
    }
}
```

### Unindo Herança e PDO: Classe Modelo
Agora, vamos criar uma classe Modelo que será a base para todas as nossas classes que interagem com o banco de dados. Ela vai herdar de Database e vai conter métodos genéricos.

```php

class Modelo extends Database {
    protected static $tabela;

    public static function all() {
        $pdo = self::conectar();
        $stmt = $pdo->query("SELECT * FROM " . static::$tabela);
        return $stmt->fetchAll();
    }
}
```
### Criando uma Classe Usuario
Finalmente, vamos criar uma classe Usuario que herda de Modelo. Isso permite que ela use os métodos de Modelo para interagir com a tabela usuarios sem a necessidade de reescrever o código de conexão e consulta.

```php

class Usuario extends Modelo {
    protected static $tabela = 'usuarios';

    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }
}

// Usando a classe
$usuarios = Usuario::all();
print_r($usuarios);
```

Este modelo demonstra como a herança e o PDO, juntos, criam uma estrutura de código poderosa, organizada e segura para a interação com o banco de dados. Cada classe de modelo (como Usuario) apenas precisa definir qual tabela ela representa e já pode usar os métodos de sua classe pai (Modelo) para fazer consultas, criando um código mais limpo e fácil de manter.