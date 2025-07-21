<?php
include '../conexao/aulas/01_conexao_mysql.php';

// Atualizar email do ID 1
$novoEmail = "novo_email@exemplo.com";
$id = 1;

$sql = "UPDATE usuarios SET email = '$novoEmail' WHERE id = $id";

if ($conexao->query($sql)) {
    echo "Registro atualizado!";
} else {
    echo "Erro: " . $conexao->error;
}
?>