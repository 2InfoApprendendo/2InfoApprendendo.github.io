<?php
$tema = isset($_GET['tema']) ? $_GET['tema'] : 'claro';
$corFundo = ($tema == 'escuro') ? '#333' : '#FFF';
$corTexto = ($tema == 'escuro') ? '#FFF' : '#000';
?>

<body style="background:<?php echo $corFundo; ?>;color:<?php echo $corTexto; ?>">
    <h1>Interface Dinâmica</h1>
    <a href="?tema=claro">Tema Claro</a> | 
    <a href="?tema=escuro">Tema Escuro</a>
</body>