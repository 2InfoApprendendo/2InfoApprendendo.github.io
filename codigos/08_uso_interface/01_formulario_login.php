<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    // Validação (exemplo simplificado)
    if ($usuario == "admin" && $senha == "1234") {
        echo "Login efetuado!";
    } else {
        echo "Credenciais inválidas!";
    }
}
?>

<form method="post">
    Usuário: <input type="text" name="usuario"><br>
    Senha: <input type="password" name="senha"><br>
    <button type="submit">Entrar</button>
</form>