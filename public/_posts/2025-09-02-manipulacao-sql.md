### Manipulação de Dados (CRUD) com PHP e MySQL

A sigla **CRUD** é a base de qualquer aplicação que interage com um banco de dados. Ela representa as quatro operações fundamentais:

  * **C** - **Create** (Criar): Inserir novos registros.
  * **R** - **Read** (Ler): Buscar e exibir registros.
  * **U** - **Update** (Atualizar): Modificar registros existentes.
  * **D** - **Delete** (Deletar): Excluir registros.

Vamos analisar como cada uma dessas operações é realizada no seu código, que usa a extensão `mysqli` do PHP.

-----

### A Conexão com o Banco de Dados

Todos os seus exemplos começam com a mesma linha:

```php
include '../conexao/aulas/01_conexao_mysql.php';
```

Essa é a "ponte" entre o seu código PHP e o servidor MySQL. Assumimos que o arquivo `01_conexao_mysql.php` contém o código necessário para estabelecer a conexão e criar um objeto de conexão (geralmente chamado de `$conexao`). Esse objeto é a sua interface para enviar comandos SQL ao banco de dados.

-----

### Operações CRUD em Detalhes

#### 1\. CREATE (Inserção)

Esta operação adiciona uma nova linha à sua tabela.

**O Código:**

```php
// Query de inserção
$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

if ($conexao->query($sql)) {
    echo "Registro inserido!";
} else {
    echo "Erro: " . $conexao->error;
}
```

**Como funciona:**

  * A variável `$sql` armazena a **query SQL** que você quer executar.
  * O método `$conexao->query($sql)` envia a query para o banco de dados.
  * O `if` verifica se a operação foi bem-sucedida. Se sim, exibe "Registro inserido\!". Se não, a propriedade `$conexao->error` mostra a mensagem de erro detalhada do MySQL.

#### 2\. READ (Leitura)

Esta operação busca dados na tabela para exibi-los.

**O Código:**

```php
$sql = "SELECT id, nome, email FROM usuarios";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        echo "ID: " . $linha["id"] . " | Nome: " . $linha["nome"] . " | Email: " . $linha["email"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado";
}
```

**Como funciona:**

  * A query `SELECT` seleciona as colunas `id`, `nome` e `email` da tabela `usuarios`.
  * O método `$conexao->query()` retorna um objeto de resultado (`$resultado`), que não é o dado em si, mas um "ponteiro" para ele.
  * `$resultado->num_rows` verifica se a query retornou alguma linha.
  * O `while` é fundamental. O método `$resultado->fetch_assoc()` percorre cada linha do resultado e a retorna como um **array associativo** (onde as chaves são os nomes das colunas). O loop continua até que todas as linhas tenham sido processadas.

#### 3\. UPDATE (Atualização)

Esta operação modifica os dados de um ou mais registros existentes.

**O Código:**

```php
$sql = "UPDATE usuarios SET email = '$novoEmail' WHERE id = $id";

if ($conexao->query($sql)) {
    echo "Registro atualizado!";
} else {
    echo "Erro: " . $conexao->error;
}
```

**Como funciona:**

  * A query `UPDATE` define qual tabela e quais colunas serão modificadas (`SET email = ...`).
  * A cláusula **`WHERE`** é crucial. Ela especifica qual registro (`id = 1`) deve ser atualizado, evitando que você mude o email de todos os usuários por engano.

#### 4\. DELETE (Exclusão)

Esta operação remove um ou mais registros da tabela.

**O Código:**

```php
$sql = "DELETE FROM usuarios WHERE id = $id";

if ($conexao->query($sql)) {
    echo "Registro excluído!";
} else {
    echo "Erro: " . $conexao->error;
}
```

**Como funciona:**

  * A query `DELETE FROM` especifica a tabela.
  * Mais uma vez, a cláusula **`WHERE`** é essencial. Sem ela, você apagaria **todos os registros** da tabela.

-----

### ⚠️ AVISO IMPORTANTE: O Perigo da Injeção de SQL

Os exemplos acima são simples e fáceis de entender, mas têm uma grave falha de segurança. A concatenação de variáveis (`'$nome'`) diretamente na string SQL os torna vulneráveis a um ataque conhecido como **Injeção de SQL**. Um usuário mal-intencionado poderia inserir código SQL no lugar do nome ou email, potencialmente apagando ou roubando todo o seu banco de dados.

A solução é usar **Prepared Statements** (Instruções Preparadas). Eles separam a estrutura da query dos dados, tornando impossível a manipulação da query por um atacante.

**Exemplo Seguro de Inserção com Prepared Statements:**

```php
// Conexão e dados
include '../conexao/aulas/01_conexao_mysql.php';
$nome = "João' O'Malvado"; // Dados maliciosos (simulados)
$email = "joao@exemplo.com";

// Prepara a query com placeholders (?)
$stmt = $conexao->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");

// Vincula os parâmetros e seus tipos ('s' para string)
$stmt->bind_param("ss", $nome, $email);

// Executa a instrução preparada
if ($stmt->execute()) {
    echo "Registro inserido de forma segura!";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
```

Essa é a forma **correta e segura** de fazer a inserção. A query com `?` é enviada primeiro, e os dados são enviados separadamente. O banco de dados sabe que a informação enviada é apenas um valor, e não um comando SQL.

Sempre que você for trabalhar com dados dinâmicos do usuário, **sempre use Prepared Statements**.