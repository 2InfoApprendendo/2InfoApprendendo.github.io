<?php
session_start();
echo "Usuário: " . $_SESSION['usuario'] . "<br>";
echo "Último login: " . $_SESSION['ultimo_login'];
?>