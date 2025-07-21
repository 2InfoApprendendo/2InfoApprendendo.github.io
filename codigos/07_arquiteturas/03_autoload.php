<?php
spl_autoload_register(function ($classe) {
    include 'classes/' . $classe . '.class.php';
});

// Uso automático das classes
$obj = new MinhaClasse(); // Procura em classes/MinhaClasse.class.php
?>