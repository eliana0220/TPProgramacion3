<!DOCTYPE html>
<html>
<head>
<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- FUNCIONES AJAX -->
	<script type="text/javascript" src="FuncionesAjax.js"></script>

	<!-- ESTILOS -->
	<script type="text/css" href="css/Responstable.css"></script>
 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css">

	<title>IMPORTES</title>
</head>
<body>
	<input type="button" name="desloguear" id="desloguear" value="Salir" onclick="desloguear()" />
	<div id = "grillas">
		<li class="item-471"><a href="pagina_estacionados.php">Grilla Estacionados</a></li>
		<li class="item-472"><a href="pagina_importes.php">Grilla Importes</a></li>
		<li class="item-470"><a href="pagina_usuarios.php">Grilla Usuarios</a></li>
	</div>
	
	<div id="grillaImportes" class="Reponstable">
		
	</div>
  <script>
  	grillaImportes();
  </script>
</body>
</html>