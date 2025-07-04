<?php
/** Aula sobre funções em PHP */
// Função sem parâmetros e sem retorno
function ola() {
    echo "Olá, mundo! <br>";
}

// Função com parâmetros e sem retorno
function saudacao($nome) {
    echo "Olá, $nome! <br>";
}

// Função com parâmetros e com retorno
function soma($a, $b) {
    return $a + $b;
}

// Função com parâmetros e retorno de tipo específico
function multiplica(float $a, float $b): float {
    return $a * $b;
}

// Função com parâmetros padrão
function saudacaoPersonalizada($nome = "Visitante") {
    echo "Olá, $nome! <br>";
}

// Função anônima (closure)
$somaAnonima = function($a, $b) {
    return $a + $b;
};

// Função recursiva
function fatorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * fatorial($n - 1);
}

// Função que recebe outra função como parâmetro
function executarFuncao($funcao, $a, $b) {
    return $funcao($a, $b);
}

// Exemplo de uso das funções
ola();
saudacao("Maria");
echo "Soma: " . soma(5, 10) . "<br>";
echo "Multiplicação: " . multiplica(2.5, 4.0
) . "<br>";
saudacaoPersonalizada();
saudacaoPersonalizada("João");
echo "Soma Anônima: " . $somaAnonima(3,7) . "<br>";
echo "Fatorial de 5: " . fatorial(5) . "<br>";
echo "Resultado da função executada: " . executarFuncao('soma', 8, 12) . "<br>";
echo "Resultado da função anônima executada: " . executarFuncao($somaAnonima, 6, 4) . "<br>";
?>