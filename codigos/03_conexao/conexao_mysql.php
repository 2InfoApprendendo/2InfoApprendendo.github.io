<?php
// Configurações do banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'meu_banco';

// Criar conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

echo "Conectado com sucesso!";

// Fechar conexão (opcional - normalmente mantida aberta durante a aplicação)
// $conexao->close();
?>