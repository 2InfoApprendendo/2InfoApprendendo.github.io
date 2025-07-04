<?php
/**
 * Aula sobre Vetores (Arrays) em PHP
 * Esta classe demonstra como criar, acessar e percorrer arrays simples e associativos.
 */

class Vetores {

    // Exemplo de array simples e iteração com foreach
    public function arraySimples() {
        $frutas = ["maçã", "banana", "laranja"];
        echo "<strong>Array simples:</strong><br/>";
        foreach ($frutas as $fruta) {
            echo "Fruta: $fruta<br/>";
        }
    }

    // Exemplo de array associativo e iteração com foreach
    public function arrayAssociativo() {
        $aluno = [
            "nome" => "João",
            "idade" => 17,
            "turma" => "2º Info"
        ];
        echo "<strong>Array associativo:</strong><br/>";
        foreach ($aluno as $chave => $valor) {
            echo ucfirst($chave) . ": $valor<br/>";
        }
    }
}
?>
