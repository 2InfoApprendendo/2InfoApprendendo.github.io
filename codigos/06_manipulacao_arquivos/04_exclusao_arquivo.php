<?php
// Excluir arquivo
if (unlink('dados.txt')) {
    echo "Arquivo excluído!";
} else {
    echo "Falha ao excluir";
}
?>