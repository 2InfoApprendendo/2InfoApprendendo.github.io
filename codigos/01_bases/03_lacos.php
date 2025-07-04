<?php
/**
 * Aula sobre Laços de Repetição em PHP
 * Esta classe demonstra o uso de diferentes tipos de laços: for, while e foreach.
 */

class Lacos {

    // Exemplo de laço for: imprime números de 1 a 5
    public function usarFor() {
        echo "<strong>Laço for:</strong><br/>";
        for ($i = 1; $i <= 5; $i++) {
            echo "Número: $i<br/>";
        }
    }

    // Exemplo de laço while: imprime números de 1 a 5
    public function usarWhile() {
        echo "<strong>Laço while:</strong><br/>";
        $i = 1;
        while ($i <= 5) {
            echo "Número: $i<br/>";
            $i++;
        }
    }

    // Exemplo de laço do...while: imprime números de 1 a 5
    public function usarDoWhile() {
        echo "<strong>Laço do...while:</strong><br/>";
        $i = 1;
        do {
            echo "Número: $i<br/>";
            $i++;
        } while ($i <= 5);
    }
}

// Uso do ForEach
$numeros = [1, 2, 3, 4, 5];
echo "<strong>Laço foreach:</strong><br/>";
foreach ($numeros as $numero) {
    echo "Número: $numero<br/>";
}
// Instanciando a classe Lacos e executando os métodos
$lacos = new Lacos();
$lacos->usarFor();
$lacos->usarWhile();
$lacos->usarDoWhile();
// Fim do exemplo de laços
echo "<hr/>";
echo "Fim do exemplo de laços.<br/>";
echo "Para mais informações, consulte a documentação do PHP sobre laços de repetição.<br/>";
echo "https://www.php.net/manual/pt_BR/control-structures.for.php<br/>";
echo "https://www.php.net/manual/pt_BR/control-structures.while.php<br/>";
echo "https://www.php.net/manual/pt_BR/control-structures.foreach.php<br/>";
echo "https://www.php.net/manual/pt_BR/control-structures.do.while.php<br/>";
echo "<hr/>";
echo "Aula concluída com sucesso!<br/>";
?>
