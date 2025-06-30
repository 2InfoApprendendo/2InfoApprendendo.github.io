<?php
/***
 * Aula sobre Variaveis e Constantes
 * Conteúdo da aula: https://2infoapprendendo.github.io/php/2025/06/18/variaveis.html
 * Conteúdo da aula 2: https://2infoapprendendo.github.io/php/2025/06/18/constantes.html
 */

// Variaveis e Constantes - Nossas primeiras classes

class Variaveis {
    //Variavel $nome recebe o valor “variavel”
    public $nome = 'variavel';

    //Declaração da nova variável. O identificador será o conteúdo de $nome
    // O codigo precisará ser comentado, pois não é possivel gerar em todos os compiladores o resultado
    //private $$nome = 'DevMedia';

    //Exibe o conteúdo de $variavel (aquela do codigo comentado)
    //echo $variavel;
}

class Contantes {
    //Define uma constante chamada MAX com o valor 10 
    //O valor da constante não pode ser alterado, pois é uma constante
    public function definir_max() {
      define("MAX", 10);
    }

    const NOME = 'Alex';

    //Acessa constante definida em escopo global
    //echo NOME;
    
  }

  class Empresa {
    const NOME_EMPRESA = 'ETEC Bartolomeu'; //Dentro do escopo de classe
  }
    
  //Acessa constante definida em escopo de classe
  echo Empresa::NOME_EMPRESA;

  //Cria a constante declarada na função -> pra executar apenas uma vez
  $constantes = new Contantes();
  $constantes->definir_max();
    
  //Exibe o conteúdo da constante
  //echo(MAX);
?>

<body>
<h1>Variáveis e Constantes</h1>
<p>Este é um exemplo de como trabalhar com variáveis e constantes em PHP.</p>

Em variaveis, temos a classe <code>Variaveis</code> que demonstra o uso de variáveis, enquanto a classe <code>Contantes</code> define uma constante chamada <code>MAX</code> com o valor 10. 
<br/> 
A classe <code>Empresa</code> define uma constante chamada <code>NOME_EMPRESA</code>.  

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
