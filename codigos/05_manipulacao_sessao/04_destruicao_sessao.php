<?php
session_start();
session_unset();  // Remove todas as variáveis
session_destroy(); // Destrói a sessão
echo "Sessão destruída!";
?>