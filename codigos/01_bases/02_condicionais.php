<?php
/**
 * Aula sobre Condicionais e Lógica em PHP
 * Conteúdo da aula: https://2infoapprendendo.github.io/php/2025/06/23/logica.html
 */

// Exemplo de uso de condicionais simples e múltiplas condições

$numero = 5;

// Verifica se o número é par ou ímpar usando operador ternário
// (Comentado anteriormente: versão com if/else tradicional)
/*
if ($numero % 2 == 0) {
    $resultado = "par";
} else {
    $resultado = "impar";
}
*/
$resultado = $numero % 2 == 0 ? "par" : "impar";

echo $resultado;

// Exemplo de condicional com múltiplas possibilidades
$nome = "Anderson";

// Estrutura if/else if para diferentes saudações com base no nome
if ($nome == "Camila") {
    $saudacao = "Olá professora";
} else if ($nome == "Victor") {
    $saudacao = "Olá aluno";
} else if ($nome == "Anderson") {
    $saudacao = "Olá coordenador";
} else {
    $saudacao = "Olá visitante";
}

// Estrutura switch equivalente ao if/else acima
switch ($nome) {
    case "Camila":
        $saudacao = "Olá professora";
        break;
    case "Victor":
        $saudacao = "Olá aluno";
        break;
    case "Anderson":
        $saudacao = "Olá coordenador";
        break;
    default:
        $saudacao = "Olá visitante";
        break;
}

echo $saudacao;

// Observação: Laços de repetição serão abordados na próxima aula
?>
