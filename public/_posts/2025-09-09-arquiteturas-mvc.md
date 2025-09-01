---
layout: post
title:  "O Padrão MVC de Forma Simples e Direta"
date:   2025-09-09 00:51:01 +0000
categories: php
---

O **MVC** (Model-View-Controller) é uma das arquiteturas mais famosas e importantes no desenvolvimento de software. Sua principal função é organizar o código, separando a lógica de negócio da interface do usuário. Pense em uma cozinha de restaurante:

  * O **Cliente** (usuário) faz um pedido.
  * O **Garçom** (Controller) recebe o pedido, leva-o ao chef e pede a comida.
  * O **Cozinheiro** (Model) prepara a comida. Ele não se importa com a mesa do cliente, só com a receita.
  * A **Apresentação do prato** (View) é como a comida é servida na mesa, decorada e pronta para consumo.

Essa separação garante que o chef não precise saber como arrumar a mesa e o garçom não precise saber a receita da comida.

-----

### Os Três Componentes do MVC

#### 1. Controller (Controlador)

O Controller é o cérebro da operação. Ele é o ponto de entrada da sua aplicação.

  * **Recebe as Requisições:** Ele pega a URL digitada pelo usuário e determina qual ação deve ser executada.
  * **Comunica com o Model:** Ele solicita os dados que precisa ao Model.
  * **Comunica com a View:** Ele pega os dados do Model e os envia para a View, que irá exibi-los.

Em resumo, a principal responsabilidade do Controller é **orquestrar** o fluxo da aplicação.

**Exercício Prático para o Aluno:**

Crie uma classe `ProdutoController` com dois métodos:

1.  `index()`: Esse método deve chamar a Model para obter a lista de produtos e, em seguida, passar essa lista para a `ProdutoListView`.
2.  `detalhe($id)`: Esse método deve receber um ID. Ele deve chamar a Model para buscar o produto com esse ID e, em seguida, passar o produto para a `ProdutoDetailView`.

**Código de Exemplo para Guia:**

```php
// classes/ProdutoController.php
require_once 'ProdutoModel.php';
require_once 'ProdutoListView.php';
require_once 'ProdutoDetailView.php';

class ProdutoController {
    public function index() {
        $model = new ProdutoModel();
        $view = new ProdutoListView();
        $produtos = $model->listarProdutos();
        $view->mostrarLista($produtos);
    }

    public function detalhe($id) {
        $model = new ProdutoModel();
        $view = new ProdutoDetailView();
        $produto = $model->obterProdutoPorId($id);
        $view->mostrarDetalhe($produto);
    }
}
```

#### 2. Model (Modelo)

O Model é a camada de dados e lógica de negócio.

  * **Lida e Interage com os Dados:** É a Model que se conecta ao banco de dados, arquivos ou APIs para buscar, salvar, atualizar ou excluir informações.
  * **Contém a Lógica de Negócio:** Se há uma regra para validar um e-mail ou calcular um imposto, essa lógica pertence ao Model.

O Model **não sabe nada sobre o que o usuário está vendo**. Ele apenas lida com os dados e as regras que os governam.

**Exercício Prático para o Aluno:**

Crie uma classe `ProdutoModel`. Ela deve ter os seguintes métodos:

1.  `listarProdutos()`: Retorne um array de produtos. Cada produto deve ser um array associativo com `id`, `nome` e `preco`. Ex: `[['id' => 1, 'nome' => 'Camisa', 'preco' => 50.00], ...]`.
2.  `obterProdutoPorId($id)`: Receba um ID e retorne apenas o array do produto correspondente.
3.  `salvarProduto($dados)`: Receba um array com os dados de um novo produto e adicione-o à lista. Simule o retorno de um ID.

**Código de Exemplo para Guia:**

```php
// classes/ProdutoModel.php
class ProdutoModel {
    private $produtos = [
        ['id' => 1, 'nome' => 'Camisa', 'preco' => 50.00],
        ['id' => 2, 'nome' => 'Calça', 'preco' => 120.00],
    ];

    public function listarProdutos() {
        return $this->produtos;
    }

    public function obterProdutoPorId($id) {
        foreach ($this->produtos as $produto) {
            if ($produto['id'] == $id) {
                return $produto;
            }
        }
        return null; // Retorna nulo se o produto não for encontrado
    }

    public function salvarProduto($dados) {
        $novoId = count($this->produtos) + 1;
        $dados['id'] = $novoId;
        $this->produtos[] = $dados;
        return $novoId;
    }
}
```


#### 3. View (Visão)

A View é a camada de apresentação.

  * **Responsável pela Interface:** A View gera o HTML, CSS e JavaScript que o usuário vê no navegador.
  * **Recebe Dados do Controller:** Ela recebe os dados do Controller e os formata para exibição.
  * **Não Tem Lógica de Negócio:** A View deve ser o mais "burra" possível. Seus únicos trabalhos são receber dados e exibi-los.

**Exercício Prático para o Aluno:**

Crie duas Views:

1.  Uma classe `ProdutoListView` com um método `mostrarLista($produtos)`. Esse método deve receber o array de produtos e gerar uma lista HTML (`<ul>` e `<li>`) formatando cada item.
2.  Uma classe `ProdutoDetailView` com um método `mostrarDetalhe($produto)`. Esse método deve receber um único produto e gerar um HTML com os detalhes, como `<h1>Nome do Produto</h1><p>Preço: R$ 50,00</p>`.

**Código de Exemplo para Guia:**

```php
// classes/ProdutoListView.php
class ProdutoListView {
    public function mostrarLista($produtos) {
        echo "<h1>Lista de Produtos</h1>";
        echo "<ul>";
        foreach ($produtos as $produto) {
            echo "<li>" . $produto['nome'] . " - R$ " . number_format($produto['preco'], 2, ',', '.') . "</li>";
        }
        echo "</ul>";
    }
}

// classes/ProdutoDetailView.php
class ProdutoDetailView {
    public function mostrarDetalhe($produto) {
        echo "<h1>Detalhes do Produto</h1>";
        if ($produto) {
            echo "<h2>" . $produto['nome'] . "</h2>";
            echo "<p>ID: " . $produto['id'] . "</p>";
            echo "<p>Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>";
        } else {
            echo "<p>Produto não encontrado.</p>";
        }
    }
}
```

-----

### Finalizando o código praticado

Ao executarmos cada uma das partes do código, a primeira coisa que o script faz é chamar o Controller. O Controller, por sua vez, cuida de todo o resto, garantindo que as responsabilidades de cada classe sejam respeitadas. Isso torna o seu código muito mais fácil de entender e de dar manutenção.


**Ponto de finalização (index.php):**

Por fim, o arquivo principal que o usuário acessa deve ter a lógica para chamar o Controller correto.

```php
// index.php
require_once 'classes/ProdutoController.php';

// Simulação de roteamento:
// Se a URL for ?acao=detalhe&id=1, o script deve chamar o método 'detalhe'
// Se a URL não tiver nada, ele deve chamar o método 'index'

$controller = new ProdutoController();

if (isset($_GET['acao']) && $_GET['acao'] == 'detalhe' && isset($_GET['id'])) {
    $controller->detalhe($_GET['id']);
} else {
    $controller->index();
}
```

Com esses exercícios, o aluno poderá ver cada parte do MVC em ação e entender como a separação de responsabilidades cria um código mais limpo e organizado.