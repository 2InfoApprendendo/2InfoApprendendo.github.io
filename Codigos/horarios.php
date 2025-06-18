<?php

// Entendendo horários e datas - em uma classe configurada
date_default_timezone_set('America/Sao_Paulo');

  class Horario {
  
    private $hoje;
    private $horas;
    
    function getHoje() {
      $this->hoje = date_format(new DateTime(), "d/m/Y");
    }
    
    function getHoras() {
      $this->horas = date_format(new DateTime(), "H:i:s");
    }
    
    //echo "Hoje é ", $hoje, ". Agora são: ", $horas, " pelo Horário de São Paulo";
  }

?>

<body>
<p>Hoje é <?php $horario = new Horario(); echo $horario->getHoje();?>. Agora são 
