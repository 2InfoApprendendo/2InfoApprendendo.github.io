<?php

// Aula sobre manipulação de datas e horários em PHP usando classes
// Define o fuso horário padrão como o de São Paulo
date_default_timezone_set('America/Sao_Paulo');

class Horario {

    // Atributos privados para armazenar a data e a hora atual
    private $hoje;
    private $horas;

    // Método que define o atributo $hoje com a data atual no formato dia/mês/ano
    function getHoje() {
        $this->hoje = date_format(new DateTime(), "d/m/Y");
    }

    // Método que define o atributo $horas com a hora atual no formato hora:minuto:segundo
    function getHoras() {
        $this->horas = date_format(new DateTime(), "H:i:s");
    }

    // Exemplo de saída formatada (comentado)
    // echo "Hoje é ", $hoje, ". Agora são: ", $horas, " pelo Horário de São Paulo";
}

?>

<body>
<p>
  Hoje é 
  <?php 
    $horario = new Horario(); 
    echo $horario->getHoje(); 
  ?>. 
  Agora são 
</p>
<p>
  <?php 
    $horario->getHoras(); 
    echo $horario->horas; 
  ?> pelo Horário de São Paulo.
</p>
</body>