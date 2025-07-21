<?php
include '../conexao/aulas/01_conexao_mysql.php';

$sql = "SELECT id, nome, email FROM usuarios";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        echo "ID: " . $linha["id"] . " | Nome: " . $linha["nome"] . " | Email: " . $linha["email"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado";
}
?>