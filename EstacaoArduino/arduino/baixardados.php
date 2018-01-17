 <?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Monitoramento Meteorológico via Arduino</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://177.194.144.206:8095/arduino/">Monitorar</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="http://177.194.144.206:8095/arduino/pesquisardados.php">Pesquisar Dados</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <main role="main" class="container">
      <div class="mt-3">
        <h1>Dados Pesquisados</h1>
      <table width = "500" border="1" cellspacing="2" cellpadding="5">
      </div>
		
			<tr>
				<td><b>Data e hora</b></td>
				<td><b>Sensor de Temperatura</b></td>
				<td><b>Sensor de Umidade</b></td>
			</tr>
<?php
	include("conecta.php");
	
	$dtaini = $_POST['dtaini'];
	$dtafim = $_POST['dtafim'];
	$resultado_data = "SELECT * FROM tabelaarduino where data_hora between '$dtaini' and '$dtafim'";
	$resultado_dat = mysqli_query($conexao, $resultado_data);
	$_SESSION['dtaini'] = $dtaini;
	$_SESSION['dtafim'] = $dtafim;
	
	while($linha = mysqli_fetch_array($resultado_dat))
	{
		echo '<tr>';
			echo '<td>'.date('d/m/y - G:i:s', strtotime($linha["data_hora"])).'</td>';
			echo '<td>'.$linha["temperatura"].'</td>';
			echo '<td>'.$linha["umidade"].'</td>';
		echo '</tr>';
	}
?>
		<tr>
			<td><a href="http://177.194.144.206:8095/arduino/gerar_excel.php"><button type='button' class='input_border'>Gerar Excel</button></a></td>
			<td><a href="http://177.194.144.206:8095/arduino/pesquisardados.php"><button type='button' class='input_border'>Voltar</button></a></td>
		</tr>
		</table>
		
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Universidade de Amazônia</span>
      </div>
    </footer>
  </body>
</html>