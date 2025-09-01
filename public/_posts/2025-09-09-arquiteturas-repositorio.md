---
layout: post
title:  "MVC: O Padrão Repositório - Um Cozinheiro para Cada Prato"
date:   2025-09-10 00:51:01 +0000
categories: php
---

Para entender o **padrão Repositório**, vamos voltar à nossa analogia do restaurante. Se o **Model** é o cozinheiro, o Repositório é um cozinheiro especialista que se concentra em um tipo de ingrediente ou prato. Ele sabe exatamente como buscar, cortar e preparar aquele ingrediente, sem se preocupar com a receita final.

O principal objetivo do Repositório é **abstrair a fonte de dados**. Ou seja, ele esconde do seu código a complexidade de como e de onde os dados estão vindo.

-----

### Por que Usar o Repositório?

1.  **Flexibilidade:** E se amanhã você decidir trocar o MySQL pelo PostgreSQL? Ou até mesmo começar a buscar dados de uma API externa em vez de um banco de dados? Sem o padrão Repositório, você teria que mudar o código do seu Model em dezenas de lugares. Com o Repositório, você só precisa criar uma nova classe.

2.  **Facilidade de Teste:** O Repositório torna o seu código mais fácil de testar. Você pode "simular" o Repositório para testar a sua lógica de negócio sem precisar de uma conexão real com o banco de dados.

3.  **Código Mais Limpo:** Sua lógica de negócio (no Model) não precisa mais ter código de banco de dados. O Model apenas pede os dados ao Repositório, e este se encarrega de obtê-los.

-----

### O Conceito-Chave: A Interface

O segredo do padrão Repositório é o uso de uma **interface**. Uma interface é como um "contrato". Ela define quais métodos uma classe deve ter, mas não diz como esses métodos devem ser implementados.

No seu código, a interface `RepositorioUsuario` é o contrato:

```php
interface RepositorioUsuario {
    // Declara que qualquer classe que implementar esta interface deve ter o método getTodos()
    public function getTodos();
}
```

Isso significa que qualquer classe que implementar `RepositorioUsuario` **deve** ter o método `getTodos()`.

### O Exemplo na Prática

#### **A Implementação do Repositório (O Cozinheiro Especialista)**

A classe `UsuarioRepositorioMySQL` é a **implementação** que cumpre o contrato. Ela é um cozinheiro que se especializou em ingredientes MySQL.

```php
class UsuarioRepositorioMySQL implements RepositorioUsuario {
    public function getTodos() {
        // Lógica real para buscar dados do MySQL
        // return $conexao->query("SELECT * FROM usuarios");
        
        // Simulação de dados
        return ["Carlos", "Ana", "Lucas"];
    }
}
```

Observe a linha `implements RepositorioUsuario`. Isso é como assinar o contrato, prometendo que o método `getTodos()` será implementado.

#### **A Injeção de Dependência (O Novo Garçom)**

Agora, o seu **Controller** não cria mais a Model diretamente. Em vez disso, ele recebe o Repositório como um parâmetro. Isso se chama **Injeção de Dependência**.

```php
class UsuarioController {
    private $repositorio;
    
    // O Controller recebe o Repositório no construtor
    public function __construct(RepositorioUsuario $repo) {
        $this->repositorio = $repo;
    }
    
    public function listar() {
        // O Controller não sabe de onde os dados vêm. Ele apenas pede ao Repositório.
        $dados = $this->repositorio->getTodos();
        print_r($dados);
    }
}
```

Quando você cria o `Controller`, você "injeta" o Repositório que deseja usar.

```php
// Uso
// Injetamos a implementação MySQL no Controller
$controller = new UsuarioController(new UsuarioRepositorioMySQL());
$controller->listar();
```

Essa é a beleza do padrão. O `UsuarioController` não se importa se os dados vêm de um banco de dados, de um arquivo ou de uma API. Ele só se preocupa em ter uma classe que implementa a interface `RepositorioUsuario`.

Isso torna a sua aplicação muito mais flexível e fácil de dar manutenção.