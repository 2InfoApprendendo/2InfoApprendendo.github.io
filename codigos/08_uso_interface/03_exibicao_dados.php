<?php
$dados = ["Notebook", "Smartphone", "Tablet"];
?>

<h3>Produtos Disponíveis:</h3>
<ul>
<?php foreach ($dados as $item): ?>
    <li><?php echo $item; ?></li>
<?php endforeach; ?>
</ul>