<?php
/**
 * Aula sobre Variáveis e Constantes em PHP
 * Conteúdo da aula: https://2infoapprendendo.github.io/php/2025/06/18/variaveis.html
 * Conteúdo da aula 2: https://2infoapprendendo.github.io/php/2025/06/18/constantes.html
 */

// Classes demonstrando o uso de variáveis e constantes

class Variaveis {
    // Atributo público $nome recebe o valor "variavel"
    public $nome = 'variavel';

    // Tentativa de criar uma variável com nome dinâmico (não suportado por todos os interpretadores)
    // Comentado por questões de compatibilidade
    // private $$nome = 'DevMedia';

    // Tentativa de exibir o conteúdo da variável dinâmica
    // echo $variavel;
}

class Contantes {
    // Método que define uma constante global chamada MAX com valor 10
    public function definir_max() {
        define("MAX", 10);
    }

    // Constante de classe chamada NOME com valor "Alex"
    const NOME = 'Alex';

    // Tentativa de acessar a constante diretamente (comentado)
    // echo NOME;
}

class Empresa {
    // Constante de classe chamada NOME_EMPRESA com valor "ETEC Bartolomeu"
    const NOME_EMPRESA = 'ETEC Bartolomeu';
}

// Acessa e exibe a constante da classe Empresa
echo Empresa::NOME_EMPRESA;

// Instancia a classe Contantes e define a constante MAX
$constantes = new Contantes();
$constantes->definir_max();

// Exibe o valor da constante MAX (comentado)
// echo(MAX);
?>

<body>
<h1>Variáveis e Constantes</h1>
<p>Este é um exemplo de como trabalhar com variáveis e constantes em PHP.</p>

<p>
  Na classe <code>Variaveis</code>, demonstramos a criação de uma variável simples.<br/>
  A classe <code>Contantes</code> define uma constante global chamada <code>MAX</code> e uma constante de classe chamada <code>NOME</code>.<br/>
  Já a classe <code>Empresa</code> define uma constante de classe chamada <code>NOME_EMPRESA</code>.
</p>

<p>
  <?php
    $variaveis = new Variaveis();
    echo "Variável: " . $variaveis->nome . "<br/>";
    echo "Constante NOME: " . Contantes::NOME . "<br/>";
    echo "Constante NOME_EMPRESA: " . Empresa::NOME_EMPRESA . "<br/>";
    echo "Constante MAX: " . MAX . "<br/>";
  ?>
</p>

</body>
