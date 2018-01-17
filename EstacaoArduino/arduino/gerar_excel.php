 <?php
	session_start();
	include_once('conecta.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Dados</title>
	<head>
	<body>
		<?php
		include("conecta.php");
		$dtaini = $_SESSION['dtaini'];
		$dtafim = $_SESSION['dtafim'];
		$arquivo = 'Dadosclimaticos.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="3">Temperatura e Umidade</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Data e hora</b></td>';
		$html .= '<td><b>Temperatura</b></td>';
		$html .= '<td><b>Umidade</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$resultado_data = "SELECT * FROM tabelaarduino where data_hora between '$dtaini' and '$dtafim'";
		$resultado = mysqli_query($conexao, $resultado_data);
		//$resultado_dados = mysqli_query($conexao, $resultado);
		
		while($row_dados = mysqli_fetch_assoc($resultado)){
			$html .= '<tr>';
			$data = date('d/m/y - G:i:s',strtotime($row_dados["data_hora"]));
			$html .= '<td>'.$data.'</td>';
			$html .= '<td>'.$row_dados["temperatura"].'</td>';
			$html .= '<td>'.$row_dados["umidade"].'</td>';	
			$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>