---
layout: post
title:  "O que são as constantes em PHP?"
date:   2025-06-18 19:43:01 -3000
image: https://github.com/2InfoApprendendo/2InfoApprendendo.github.io/blob/site/public/assets/images/posts/bases-3.png?raw=true
categories: php
---

<div align="center">
    <iframe width="100%" height="315" src="https://www.youtube.com/embed/p8ZjXZ2J11E title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>

## Sobre

Constantes são identificadores usados para armazenar valores que não podem ser modificados depois de definidos. Ou seja, uma vez que você declara uma constante, seu valor será sempre o mesmo durante a execução do programa.

## 📌 Características principais:

1. São imutáveis após a definição.
2. Não precisam (nem podem) começar com o símbolo $.
3. São úteis para armazenar valores fixos que você quer reutilizar, como taxas, versões, URLs, ou configurações de sistema.

## 🧑‍💻 Como declarar constantes em PHP?

PHP oferece duas formas principais:

1. `define()`: A forma tradicional, compatível desde as primeiras versões do PHP.
    - O nome da constante deve ser uma string em caixa alta (por convenção).
    - Pode ser usada fora de classes.
    - Não funciona dentro de escopos de classe com public, protected ou private.
2. `const`: Introduzido no PHP 5.3, semelhante a outras linguagens.
    - Mais moderno.
    - Pode ser usado dentro de classes, inclusive com visibilidade:

```php
//Exemplos

//Uso de define como constante
define("TAXA_JUROS", 0.05);
echo TAXA_JUROS;  // Imprime: 0.05
```

```php
//Uso do const fora do escopo de uma classe
const VERSAO = "1.2.0";
echo VERSAO;  // Imprime: 1.2.0
```

```php
//Uso do const dentro de uma classe
class Config {
    public const API_URL = "https://api.exemplo.com";
}
```

## 📚 Comparação com outras linguagens:

| Linguagem | Exemplo de constante | Observações |
| --- | --- | --- |
| PHP | define(“NOME”, “valor”) ou const NOME = “valor” | define() mais flexível, const mais moderno |
| C | #define PI 3.14 | Pré-processador substitui o valor |
| C++/Java | final int TAMANHO = 10; | final impede reatribuição |
| JavaScript (ES6+) | const NOME = valor; | Escopo de bloco, imutável |

## 🎯 Quando usar constantes?

Use constantes quando:

1. O valor não deve ser alterado.
2. Você quer garantir a consistência em vários pontos do código.
3. Está definindo configurações globais.

### Exemplos:

```php
define("URL_BASE", "https://meusite.com");
const MAX_TENTATIVAS = 5;
```

## ⚠️ Diferenças importantes com variáveis:

| Aspecto | Constantes | Variáveis |
| --- | --- | --- |
| Símbolo | Sem `$` | Começam com `$` |
| Mutabilidade | Imutáveis | Podem mudar de valor |
| Escopo | Global por padrão | Local/global dependendo do contexto |
| Definição | `define()` ou `const` | Atribuição direta (`$var = ...`) |

## ✅ Boas práticas

1. Use letras maiúsculas e underscores: TAXA_CAMBIO, API_KEY.
2. Agrupe constantes relacionadas em classes ou arquivos próprios.
3. Evite misturar define() e const no mesmo contexto.