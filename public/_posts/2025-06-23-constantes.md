---
layout: post
title:  "O que são as constantes em PHP?"
date:   2025-06-18 19:43:01 +0000
categories: php
---

Constantes são identificadores usados para armazenar valores que não podem ser modificados depois de definidos. Ou seja, uma vez que você declara uma constante, seu valor será sempre o mesmo durante a execução do programa.

## 📌 Características principais:

1. São imutáveis após a definição.

2. Não precisam (nem podem) começar com o símbolo $.

3. São úteis para armazenar valores fixos que você quer reutilizar, como taxas, versões, URLs, ou configurações de sistema.

🧑‍💻 Como declarar constantes em PHP?

PHP oferece duas formas principais:
1. ``define()``

A forma tradicional, compatível desde as primeiras versões do PHP.

```php 
define("TAXA_JUROS", 0.05);
echo TAXA_JUROS;  // Imprime: 0.05
```

* O nome da constante deve ser uma string em caixa alta (por convenção).
* Pode ser usada fora de classes.
* Não funciona dentro de escopos de classe com public, protected ou private.

2. const

Introduzido no PHP 5.3, semelhante a outras linguagens.

```php
const VERSAO = "1.2.0";
echo VERSAO;  // Imprime: 1.2.0
```

* Mais moderno.
* Pode ser usado dentro de classes, inclusive com visibilidade:

```php
class Config {
    public const API_URL = "https://api.exemplo.com";
}
```

## 📚 Comparação com outras linguagens:

| Linguagem |	Exemplo de constante	| Observações| 
| ----| ----|----| 
| PHP	| define("NOME", "valor") ou const NOME = "valor"	| define() mais flexível, const mais moderno| 
| C | 	#define PI 3.14	| Pré-processador substitui o valor| 
| C++/Java |	final int TAMANHO = 10;	| final impede reatribuição|
| JavaScript (ES6+)	| const NOME = valor; | 	Escopo de bloco, imutável |

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

| Aspecto      | Constantes            | Variáveis                           |
| ------------ | --------------------- | ----------------------------------- |
| Símbolo      | Sem `$`               | Começam com `$`                     |
| Mutabilidade | Imutáveis             | Podem mudar de valor                |
| Escopo       | Global por padrão     | Local/global dependendo do contexto |
| Definição    | `define()` ou `const` | Atribuição direta (`$var = ...`)    |


## ✅ Boas práticas

1. Use letras maiúsculas e underscores: TAXA_CAMBIO, API_KEY.

2. Agrupe constantes relacionadas em classes ou arquivos próprios.

3. Evite misturar define() e const no mesmo contexto.