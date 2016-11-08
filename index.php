<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
	
<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--<script src="jquery-1.11.3.min.js"></script>
	<script src="jquery.min.js"></script>-->

	<!--<script type="text/javascript" src="jquery.js"></script>-->
	<!-- FUNCIONES AJAX -->
	<script type="text/javascript" src="FuncionesAjax.js"></script>


<title>LOGIN</title>

</head>
<body >

<h3>ESTACIONAMIENTO</h3>

<!-- <li class="item-471"><a href="pagina_estacionados.php">Grilla Estacionados</a></li>
<li class="item-472"><a href="pagina_importes.php">Grilla Importes</a></li>
<li class="item-470"><a href="pagina_usuarios.php">Grilla Usuarios</a></li> -->



<h3><span><span>Login</span></span></h3>
<form  method="POST">
<div id="login" style="visibility:hidden">
	<table>
		<tr>
			<td>USUARIO</td>
			<td><input type="text" name="usuario" id="usuario" value=
				 "<?php if(isset($_COOKIE['usuario'])){echo $_COOKIE['usuario'];} else {echo "";} ?>" /></td>
		</tr>
		<tr>
			<td>CONTRASEÑA</td>
			<td><input type="password" name="clave" id="clave" value=
				 "<?php if(isset($_COOKIE['clave'])){echo $_COOKIE['clave'];} else {echo "";} ?>" /></td>
		</tr>
	</table>
	Recordarme <input type="checkbox" name="recordarme" id="recordarme" /> 
	<input type="button" name="accion" id="accion" value="Ingresar" onclick="validarLogin()" />	
	<br><br>
</div>
	<input type="button" name="login" id="login" value="Login" onclick="mostrarLogin()" />	
	<input type="button" name="admin" id="admin" value="Test Admin" onclick="testAdmin()" />	
	<input type="button" name="comun" id="comun" value="Test Usuario" onclick="testComun()" />
</form>


<div class="footer1">Copyright &#169; 2016 Trabajo Práctico - Programación 3 - UTN . Vera Eliana ->  </div>
<div class="footer2"><a href="https://github.com/eliana0220/TPProgramacion3">  Go to GitHub</a> </div>

 </body>
</html>