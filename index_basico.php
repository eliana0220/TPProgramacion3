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

<li class="item-471"><a href="/free_2013_virtuemart_2_0_22_a/index.php/delivery">Grilla Estacionados</a></li>
<li class="item-472"><a href="/free_2013_virtuemart_2_0_22_a/index.php/faqs">Grilla Importes</a></li>
<li class="item-470"><a href="/free_2013_virtuemart_2_0_22_a/index.php/contact">Grilla Usuarios</a></li>



<h3><span><span>Login</span></span></h3>
<form  method="POST">
<div id="login">
	<table>
		<tr>
			<td>USUARIO</td>
			<td><input type="text" name="usuario" id="usuario" /></td>
		</tr>
		<tr>
			<td>CONTRASEÑA</td>
			<td><input type="password" name="clave" id="clave" /></td>
		</tr>
	</table>
	Recordarme <input type="checkbox" name="recordarme" id="recordarme" /> 
	<br><br>
</div>
	<input type="button" name="accion" id="accion" value="Ingresar" onclick="validarLogin()" />	
</form>

<script>
	$('accion').click(function(e) {
    e.stopPropagation(); // stop event bubbling
    alert("paro"); 
});

$('#login').click(function() {
    $("accion", $(this)).click();
});

$('accion').trigger('click');
</script>


<div class="footer1">Copyright &#169; 2016 Trabajo Práctico - Programación 3 - UTN . Vera Eliana ->  </div>
<div class="footer2"><a href="https://github.com/eliana0220/TPProgramacion3">  Go to GitHub</a> </div>

 </body>
</html>