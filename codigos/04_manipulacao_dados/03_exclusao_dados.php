<?php
include '../conexao/aulas/01_conexao_mysql.php';

// Excluir registro com ID 2
$id = 2;

$sql = "DELETE FROM usuarios WHERE id = $id";

if ($conexao->query($sql)) {
    echo "Registro excluído!";
} else {
    echo "Erro: " . $conexao->error;
}
?>