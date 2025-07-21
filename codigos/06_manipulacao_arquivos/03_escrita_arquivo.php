<?php
// Adicionar conteúdo ao final do arquivo
$arquivo = fopen('dados.txt', 'a');
fwrite($arquivo, "Novo conteúdo adicionado\n");
fclose($arquivo);
echo "Conteúdo adicionado!";
?>