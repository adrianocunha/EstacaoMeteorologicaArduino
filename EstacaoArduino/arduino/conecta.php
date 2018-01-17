<?php

	$usuario = "root";
	$senha = "";
	$host = "localhost";
	
	$conexao = mysqli_connect($host,$usuario,$senha);
	$selecionabd = mysqli_select_db($conexao, 'bancoarduino');
/*
	if($conexao)
	{
		echo "conectou com sucesso";
	} else {
		echo "ocorreu um erro";
	}
*/
?>