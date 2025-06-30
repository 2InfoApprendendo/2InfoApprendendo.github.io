<?php
/***
 * Aula sobre Condicionais e Lógica
 * Conteúdo da aula: https://2infoapprendendo.github.io/php/2025/06/23/logica.html
 * 
 */


// Aula sobre Condicionais - Aviso: a classe vai ser atualizada

    $numero = 5;
	
	// Descobrir se o numero é par ou impar 
	
	/*if($numero % 2 == 0){
	  $resultado = "par";
	} else {
	  $resultado = "impar";
	}*/
	
	//O mesmo if/else, com o operador ternario (corrigido após a reconexão com internet em 18/06/25)
	$resultado = $numero % 2 == 0 ? "par" : "impar";
	
	echo $resultado;
	

	//Condicional para casos de mais de um resultado verdadeiro
	$nome = "Anderson";

	if($nome == "Camila"){
		$saudacao = "Olá professora";
	} else if ($nome == "Victor") {
		$saudacao = "Olá aluno";
	} else if($nome == "Anderson"){
		$saudacao = "Olá coordenador";
	} else {
		$saudacao = "Olá visitante";
	}

	switch ($nome) {
		case "Camila": 
		  $saudacao = "Olá professora";
		  break;
		case "Victor": 
		  $saudacao = "Olá aluno";
		  break;
		case "Anderson": 
		  $saudacao = "Olá coordenador";
		  break;
		default: 
		  $saudacao = "Olá visitante";
		  break;
	}

	echo $saudacao;

	
	//Laços - Próxima aula, após feedback
?>