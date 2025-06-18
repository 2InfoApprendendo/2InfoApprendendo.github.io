---
layout: post
title:  "O que são as variáveis em PHP?"
date:   2025-06-18 19:43:01 +0000
categories: php
---

É onde armazenamos os dados. Sempre a declaramos com o símbolo $. Variáveis podem ser palavras (strings), números inteiros ou reais (int ou float) ou booleanos.

## Exemplos de declaração de variáveis:

```php
$nome = "João"; // É uma variavel com caracteres (string)
$idade = 30; // É uma varivael com numeros inteiros
$email = "joao@exemplo.com";
$resultado = true; // É uma variavel booleana
$valor = 2.50; // É uma variavel com numeros reais
```

Uma variável é um recurso das linguagens de programação utilizado para armazenar valores em memória. Assim, sempre que precisarmos desse valor, basta referenciarmos essa variável e obteremos o dado desejado.

A declaração de variáveis em PHP é bastante simples. Como a linguagem é fracamente tipada, não é necessário informar o tipo de dado na declaração. Sintaxe de declaração de variável:

`$variavel;`

Note que basta escrever o símbolo $ seguido do nome desejado. O tipo da variável será determinado conforme seu uso, ou seja, caso receba uma string, será do tipo string, caso receba um número inteiro, será uma variável do tipo inteiro.

### Variaveis Dinamicas
Com o PHP podemos criar novas variáveis definindo como o nome dessas o conteúdo de outra. Para isso devemos utilizar o símbolo $$ seguido do nome da variável que contém o nome para atribuição.

#### Exemplo de criação de variável dinâmica:

```php 
//Variavel $nome recebe o valor “variavel”
$nome = 'variavel';

//Declaração da nova variável. O identificador será o conteúdo de $nome
$$nome = 'DevMedia';

//Exibe o conteúdo de $variavel
echo $variavel;
```

A execução deste código exibirá como resultado “DevMedia”. A ideia principal da variável dinâmica é possibilitar a criação de variáveis em tempo de execução.

### Variaveis em uma classe

(Para esta aula, é sugerido que acompanhe o material sobre Minha Primeira Classe)

Ao declarar uma variável dentro de uma classe, antes do nome atribuído é mandatório especificar o modificador de acesso.

Sintaxe de declaração de variável em uma classe:

`modificador_de_acesso $variavel`

Como PHP é uma linguagem Orientada a Objetos, lembre-se que é com os modificadores de acesso que encapsulamos os atributos e métodos de uma classe.

#### Exemplo de declaração de variáveis/atributos em uma classe:

```php 
class Cadastro {
    public $nome = "";
    public $email = "";
    public $senha = "";
    public $genero = "";
    public $descricao = "";
    public $website = "";
}
```

* class Classe -> nome da classe que utilizamos (no caso, é o nome da página)

* public/private/protected $variavel -> utilizo um método de disponibilidade (se será acessível ou não aquela variável da classe)

* Sempre salve o arquivo com a sua edição e recarregue a página para ver visualmente.

Original de [DevMedia](https://www.devmedia.com.br/php-declaracao-e-atribuicao-de-variaveis-e-constantes/38220) e [Slides da Prof](https://docs.google.com/presentation/d/1YEwZDj3L7Isnbkl2DANMtSHwsx0Y5TaOPg0WPttDe2M/edit?slide=id.g346a92fc837_0_143#slide=id.g346a92fc837_0_143)
