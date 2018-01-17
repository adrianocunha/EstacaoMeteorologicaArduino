<?php
	include("conecta.php");
	
	$dtaini = $_POST['dtaini'];
	$dtafim = $_POST['dtafim'];
	$resultado_data = "SELECT * FROM tabelaarduino where data_hora between '$dtaini' and '$dtafim'";
	$resultado_dat = mysqli_query($conexao, $resultado_data);
	
	while($rows_data = mysqli_fetch_array($resultado_dat)){
		
		echo '<tr>';
			echo '<td>'.date('d/m/y - G:i:s', strtotime($rows_data["data_hora"])).'</td><br>';
			echo '<td>'.$rows_data["temperatura"].'</td><br>';
			echo '<td>'.$rows_data["umidade"].'</td><br>';
		echo '</tr>';
	}
?>