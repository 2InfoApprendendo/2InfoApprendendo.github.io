<?php
/***
 * Aula sobre Variaveis e Constantes
 * Conteúdo da aula: https://2infoapprendendo.github.io/php/2025/06/18/variaveis.html
 * Conteúdo da aula 2: https://2infoapprendendo.github.io/php/2025/06/18/constantes.html
 */

// Variaveis e Constantes - Nossa primeira classe

class VariaveisConstantes {
    //Variavel $nome recebe o valor “variavel”
    private $nome = 'variavel';

    //Declaração da nova variável. O identificador será o conteúdo de $nome
    private $$nome = 'DevMedia';

    //Exibe o conteúdo de $variavel
    echo $variavel;

    public function definir_max() {
      define("MAX", 10);
    }

    //Cria a constante declarada na função -> pra executar apenas uma vez
    definir_max();
    
    //Exibe o conteúdo da constante
    echo(MAX);
    
    //definir_max();


    private const NOME = 'Alex';  //Fora do escopo de classe
    
    class Empresa {
        const NOME_EMPRESA = 'DevMedia'; //Dentro do escopo de classe
    }

    //Acessa constante definida em escopo global
    echo NOME;
    
    //Acessa constante definida em escopo de classe
    echo Empresa::NOME_EMPRESA;
    
  }
?>

<body>

<p>Hoje é 
  <?php 
    $horario = new Horario(); 
    echo $horario->getHoje(); 
  ?>. 

</body>
