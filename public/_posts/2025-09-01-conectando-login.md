---
layout: post
title:  "Classes e Conexões com PHP: Iniciando uma Sessão"
date:   2025-09-01 00:51:01 +0000
categories: php
---

Vamos mergulhar em como as **classes** em PHP nos ajudam a organizar o código e, em seguida, como podemos usar as **sessões** para manter o estado de um usuário logado. Mas antes dessa aula, veja o exemplo de código sobre a conexão local e a conexão remota em PHP, desenvolvido pela professora, no YouTube do Apprendendo.



### O que são Classes em PHP?

Uma classe é como uma planta de um objeto. Ela define as propriedades (características) e os métodos (ações) que um objeto terá. No seu código, você tem a classe `SistemaAutenticacao`, que funciona como o "cérebro" do seu sistema de login.

  - **Propriedades:** São as variáveis dentro da classe. No seu exemplo, `private $usuarios = [];` armazena todos os usuários. O termo `private` significa que essa propriedade só pode ser acessada de dentro da própria classe, o que ajuda a manter os dados seguros.
  - **Métodos:** São as funções dentro da classe que executam ações. Os métodos `adicionarUsuario()`, `autenticar()`, e `redefinirSenha()` são exemplos. Eles encapsulam a lógica do seu sistema.

### Exemplo Prático: Analisando o Código

O código abaixo é um excelente exemplo de como uma classe pode ser usada para um sistema de autenticação.

```php
// Garante que a classe Usuario esteja disponível
require_once 'Usuario.php'; 

class SistemaAutenticacao {
    private $usuarios = [];

    // Adiciona um novo usuário
    public function adicionarUsuario(Usuario $usuario) {
        $this->usuarios[] = $usuario;
    }

    // Autentica um usuário
    public function autenticar($login, $senha) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getLogin() === $login && $usuario->verificarSenha($senha)) {
                return true;
            }
        }
        return false;
    }

    // ... outros métodos
}
```

A linha `require_once 'Usuario.php';` é crucial. Ela "conecta" sua classe `SistemaAutenticacao` com a classe `Usuario`, que provavelmente define como um usuário individual é representado (com login, senha, etc.). Isso mostra como diferentes classes podem trabalhar juntas.

O método `autenticar()` percorre a lista de usuários e verifica se o login e a senha correspondem. Se encontrar, ele retorna `true`. O `return false;` no final significa que a autenticação falhou.

-----

### Conectando Tudo: As Sessões com PHP

Agora, vamos ligar isso à ideia de "iniciar uma sessão". No mundo web, o PHP é **stateless**, o que significa que ele não "lembra" o que aconteceu na requisição anterior. Toda vez que você carrega uma nova página, é como se fosse a primeira vez.

As **sessões** resolvem esse problema. Elas permitem que você armazene informações de forma persistente entre diferentes páginas do seu site, mantendo o estado do usuário.

#### Como funciona?

1.  Um usuário acessa a página de login.
2.  Ele insere login e senha e clica em "entrar".
3.  O PHP processa os dados e, usando a classe `SistemaAutenticacao`, verifica se a autenticação foi bem-sucedida.
4.  Se for, você inicia uma sessão e armazena informações sobre o usuário.

**Exemplo de Código para Iniciar uma Sessão**

Vamos supor que você tem um arquivo `login.php`:

```php
<?php
// Inicia ou retoma uma sessão
session_start();

// O require_once garante que o arquivo com a classe esteja presente
require_once 'SistemaAutenticacao.php';
require_once 'Usuario.php';

// Simulação de alguns usuários cadastrados
$sistema = new SistemaAutenticacao();
$sistema->adicionarUsuario(new Usuario(1, 'joao@email.com', 'senha123'));
$sistema->adicionarUsuario(new Usuario(2, 'maria@email.com', 'senha456'));

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Usa a classe para autenticar o usuário
    if ($sistema->autenticar($login, $senha)) {
        // Se a autenticação for bem-sucedida, armazena o login na sessão
        $_SESSION['usuario_logado'] = $login;
        
        // Redireciona o usuário para uma página restrita
        header('Location: painel.php');
        exit;
    } else {
        $erro = "Login ou senha incorretos.";
    }
}
?>
<form method="post" action="login.php">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>

<?php if (isset($erro)): ?>
    <p style="color: red;"><?php echo $erro; ?></p>
<?php endif; ?>
```

#### Como Usar a Sessão em Outras Páginas?

Em qualquer página que você queira proteger, como `painel.php`, você precisa iniciar a sessão novamente e verificar se o usuário está logado.

```php
<?php
session_start();

// Verifica se a variável de sessão 'usuario_logado' existe
if (!isset($_SESSION['usuario_logado'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit;
}

// Se o usuário estiver logado, exibe o conteúdo
$usuario = $_SESSION['usuario_logado'];
echo "<h1>Bem-vindo, $usuario!</h1>";
echo "<p>Este é o seu painel de controle.</p>";
echo "<a href='logout.php'>Sair</a>";
?>
```

-----

### Resumo da Jornada

1.  **Classes:** Use classes para modelar objetos e organizar seu código, como a classe `SistemaAutenticacao` para gerenciar usuários.
2.  **Conexões:** Classes podem se conectar umas às outras (ex: `SistemaAutenticacao` usa a classe `Usuario`).
3.  **Sessões:** Use `session_start()` e o array global `$_SESSION` para manter informações de um usuário logado entre as páginas, superando a natureza "sem estado" do PHP.

Essa combinação permite construir sistemas robustos e seguros onde a lógica de autenticação está separada do fluxo de navegação e de exibição das páginas, tornando seu código mais limpo e fácil de manter.