<?php
include '../conexao/aulas/01_conexao_mysql.php';

// Dados para inserção
$nome = "João Silva";
$email = "joao@exemplo.com";

// Query de inserção
$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

if ($conexao->query($sql) {
    echo "Registro inserido!";
} else {
    echo "Erro: " . $conexao->error;
}
?>