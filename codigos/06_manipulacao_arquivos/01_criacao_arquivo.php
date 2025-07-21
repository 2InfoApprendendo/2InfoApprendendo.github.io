<?php
// Criar e escrever em arquivo
$arquivo = fopen('dados.txt', 'w') or die("Não foi possível criar o arquivo!");
fwrite($arquivo, "Conteúdo inicial\n");
fclose($arquivo);
echo "Arquivo criado!";
?>