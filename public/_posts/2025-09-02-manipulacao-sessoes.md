---
layout: post
title:  "A Magia das Sessões: Mantendo o Estado no PHP"
date:   2025-09-03 00:51:01 +0000
categories: php
---

Na aula anterior, falamos sobre a natureza **sem estado** do PHP. Ou seja, ele não "lembra" de nada entre uma requisição (o clique de um botão ou a navegação para uma nova página) e outra. As **sessões** resolvem esse problema, funcionando como uma memória temporária para o seu site.

Uma sessão é um mecanismo que permite armazenar informações do usuário no servidor para que elas possam ser acessadas em múltiplas páginas.

-----

### Passo a Passo: O Ciclo de Vida de uma Sessão

Seu código demonstra o ciclo completo de uma sessão: iniciar, armazenar dados, ler os dados e, por fim, destruir.

#### 1\. Iniciando uma Sessão

A primeira e mais importante etapa.

**O Código:**

```php
session_start();
echo "Sessão iniciada!";
```

**Como funciona:**

  * A função `session_start()` deve ser a **primeira coisa** a ser executada em qualquer página que você deseja usar sessões.
  * Quando essa função é chamada, o PHP verifica se já existe uma sessão para o usuário.
  * Se não houver, ele cria uma nova sessão no servidor e envia um cookie (`PHPSESSID`) para o navegador do usuário. Esse cookie é como uma "chave" que o navegador usará para se conectar àquela sessão específica em todas as requisições subsequentes.
  * Se já existir uma sessão, a função simplesmente retoma a sessão existente, tornando os dados disponíveis.

#### 2\. Armazenando Dados na Sessão

Com a sessão iniciada, você pode armazenar informações usando o array global `$_SESSION`.

**O Código:**

```php
$_SESSION['usuario'] = "admin";
$_SESSION['ultimo_login'] = date('d/m/Y H:i');
echo "Dados armazenados!";
```

**Como funciona:**

  * `$_SESSION` é um array especial do PHP.
  * Você pode adicionar qualquer tipo de dado a ele: strings, números, arrays, ou até mesmo objetos.
  * No exemplo, `$_SESSION['usuario']` e `$_SESSION['ultimo_login']` funcionam como variáveis normais, mas seu valor será mantido mesmo se o usuário navegar para outra página.

#### 3\. Lendo Dados da Sessão

Para acessar as informações que você armazenou, basta chamar a variável de sessão correspondente.

**O Código:**

```php
echo "Usuário: " . $_SESSION['usuario'] . "<br>";
echo "Último login: " . $_SESSION['ultimo_login'];
```

**Como funciona:**

  * Supondo que você iniciou a sessão (`session_start()`) no topo da página, o PHP irá automaticamente carregar os dados associados àquela sessão.
  * Você pode então usar as variáveis de sessão como se fossem variáveis comuns, sabendo que os valores vêm do estado do usuário.

#### 4\. Destruindo uma Sessão

Esta é a etapa final, crucial para garantir a segurança, especialmente em sistemas de login.

**O Código:**

```php
session_unset(); 
session_destroy();
echo "Sessão destruída!";
```

**Como funciona:**

  * `session_unset()`: remove todas as variáveis do array `$_SESSION`, mas a sessão em si ainda existe.
  * `session_destroy()`: remove o arquivo de sessão do servidor e invalida o `PHPSESSID`. **É a forma mais segura de encerrar uma sessão.**
  * Após essas duas chamadas, o usuário não tem mais acesso às informações da sessão, e é como se ele nunca tivesse feito login.

-----

### Resumo: Onde Isso se Encaixa?

O sistema de autenticação que criamos na aula anterior depende totalmente das sessões. O fluxo ideal de um login é:

1.  O usuário preenche o formulário.
2.  O código PHP usa a classe `SistemaAutenticacao` para validar os dados.
3.  **Se a autenticação for bem-sucedida, você usa `session_start()` e `$_SESSION['usuario'] = $login;` para "lembrar" que o usuário está logado.**
4.  Em todas as páginas restritas, você usa `session_start()` e verifica `if (isset($_SESSION['usuario']))` para garantir que o usuário tem permissão para acessá-las.
5.  Quando o usuário clica em "Sair", você chama `session_destroy()` para encerrar a sessão de forma segura.