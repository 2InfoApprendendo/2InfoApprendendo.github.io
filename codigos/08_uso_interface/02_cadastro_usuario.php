<?php
if ($_POST) {
    // Processar dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    echo "Usuário $nome cadastrado!";
}
?>

<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Cadastrar</button>
</form>