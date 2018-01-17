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
        <h1>Pesquisar dados de temperatura e umidade</h1>
      </div>
		<table width="250" align="left" class="table_border" border="0" cellpadding="4"> 
		<form action="baixardados.php" method="POST">
			  <input type="hidden" name="aleaValue" value="MzczNw==">
		   <tr>
			<td width="50%"><b>Data início:</b> <br><input class="input_border" type="date" name="dtaini" size="12" maxlength="10" value=""></td>
			<td width="50%"><b>Data fim:</b> <br><input class="input_border" type="date" name="dtafim" size="12" maxlength="10" value=""></td>
		</tr>
		<tr>
			<td><input class="input_border" type="submit" value="Pesquisar" /></td>
		</tr>
		</form>
		</table>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Universidade de Amazônia</span>
      </div>
    </footer>
  </body>
</html>