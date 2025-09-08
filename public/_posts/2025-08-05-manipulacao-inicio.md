---
layout: post
title:  "Vetores e Listas - Manipulação de Dados"
date:   2025-08-05 00:51:01 +0000
categories: php
---

Vetores e listas são estruturas de dados fundamentais em programação. Pense neles como gaveteiros ou prateleiras que armazenam vários itens sob um único nome.

* Vetores (Arrays): São coleções de dados de um mesmo tipo, com um tamanho fixo. Imagine uma caixa com 10 compartimentos, onde cada um só pode guardar uma caneta. Você sabe exatamente o tamanho da caixa e o que ela pode conter.

* Listas (Lists): São coleções de dados que podem ter tipos variados e um tamanho dinâmico. Você pode adicionar ou remover itens a qualquer momento. Pense em uma mochila, onde você pode colocar um livro, um lanche e uma garrafa d'água, e ainda pode pegar mais coisas ou tirar.

Em muitas linguagens de programação, a distinção entre vetor e lista é mais conceitual do que estritamente técnica. Por exemplo, em PHP, o que chamamos de "array" muitas vezes se comporta como uma lista, pois seu tamanho é dinâmico e pode armazenar diferentes tipos de dados.

## Criando e Acessando um Vetor/Lista
Vamos usar a sintaxe de um vetor em PHP, que é muito versátil.

```php

// Cria um vetor de frutas
$frutas = ["Maçã", "Banana", "Laranja"];

// Acessando um item do vetor
// A contagem sempre começa em 0!
echo $frutas[0]; // Saída: Maçã
echo $frutas[2]; // Saída: Laranja
```

## Manipulando Dados
A beleza dessas estruturas está na capacidade de manipular os dados que elas contêm.

### Adicionando Itens
Você pode adicionar um novo item ao final do vetor.

```php

$frutas[] = "Morango";
print_r($frutas);

// Saída:
// Array
// (
//     [0] => Maçã
//     [1] => Banana
//     [2] => Laranja
//     [3] => Morango
// )
```

### Alterando Itens
Você pode substituir um item existente.

```php

$frutas[1] = "Pera";
print_r($frutas);

// Saída:
// Array
// (
//     [0] => Maçã
//     [1] => Pera
//     [2] => Laranja
//     [3] => Morango
// )
```

### Removendo Itens
Existem várias maneiras de remover itens. unset() remove o item, mas mantém o índice, criando uma "lacuna".

```php

unset($frutas[2]);
print_r($frutas);

// Saída:
// Array
// (
//     [0] => Maçã
//     [1] => Pera
//     [3] => Morango
// )
```

### Iterando (Percorrendo) Vetores e Listas
Para processar cada item de um vetor, usamos laços de repetição. O foreach é o mais comum e elegante.

```php

$numeros = [10, 20, 30, 40];
$soma = 0;

foreach ($numeros as $numero) {
    $soma += $numero;
}

echo "A soma dos números é: " . $soma; // Saída: A soma dos números é: 100
```