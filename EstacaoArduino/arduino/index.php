<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="refresh" content="20"; url=http://177.194.144.206:8095/arduino/index.php">
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
        <h1>Monitoramento em tempo real</h1>
      <table width = "500" border="1" cellspacing="2" cellpadding="5">
      </div>
		
			<tr>
				<td><b>Data e hora</b></td>
				<td><b>Sensor de Temperatura</b></td>
				<td><b>Sensor de Umidade</b></td>
			</tr>
<?php
	include("conecta.php");
	
	$resultado = mysqli_query($conexao, "select * from tabelaarduino order by id desc limit 1");
	
	while($linha = mysqli_fetch_array($resultado, MYSQLI_BOTH))
	{
		echo '<tr>';
			//echo '<td>'.$linha["id"].'</td>';
			//echo '<td>'.$linha["data_hora"].'</td>';
			echo '<td>'.date('d/m/y - G:i:s', strtotime($linha["data_hora"])).'</td>';
			echo '<td>'.$linha["temperatura"].'</td>';
			echo '<td>'.$linha["umidade"].'</td>';
		echo '</tr>';
	}
?>
		</table>
		
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Universidade de Amazônia</span>
      </div>
    </footer>
  </body>
</html>