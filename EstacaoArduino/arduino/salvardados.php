<?php

	include("conecta.php");
	
	$sensor_temp = $_GET['temperatura'];
	$sensor_umi = $_GET['umidade'];

	$sql_insert = "INSERT into tabelaarduino (temperatura, umidade) values ('$sensor_temp','$sensor_umi')";
	
	mysqli_query($conexao, $sql_insert);
	
	if($sql_insert)
	{
		echo "salvo com sucesso";
	} else {
		echo "ocorreu um erro";
	}
	
?>