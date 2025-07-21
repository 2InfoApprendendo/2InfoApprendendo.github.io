<?php
session_start();
$_SESSION['usuario'] = "admin"; // Armazena dado na sessão
$_SESSION['ultimo_login'] = date('d/m/Y H:i');
echo "Dados armazenados!";
?>