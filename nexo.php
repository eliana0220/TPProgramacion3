<?php 

require_once('SERVIDOR/lib/nusoap.php');
require_once("php/AccesoDatos.php");
require_once("php/Login.php");
require_once("php/Usuario.php"):

//2.- INDICAMOS URL DEL WEB SERVICE

		//REEMPLAZO
		$host = 'http://localhost:8080/TPProgramacion3/SERVIDOR/ws.php';
		

//3.- CREAMOS LA INSTANCIA COMO CLIENTE
		$client = new nusoap_client($host . '?wsdl');

//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
		$err = $client->getError();
		if ($err) {// MOSTRAMOS EL ERROR.
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}


$accion=$_POST['accion'];
var_dump($accion);
alert($accion);
json_decode($_POST['usuario']);

switch ($accion) 
{
	case 'Ingresar':

			//INVOCO AL METODO DE MI WS		
			echo $login = $client->call('ValidarUsuario', $_POST['usuario'];

			//$login = Login:: ValidarUsuario($_POST['usuario']);
			echo $login;
			var_dump($login);
			console.log($login);
			/*$usr = new Usuario();
			$usr->usuario=$_POST['usuario'];
			$usr->clave=$_POST['clave'];
			$usr->nombre=$_POST['nombre'];
			$usr->apellido=$_POST['apellido'];
			$usr->tipo=$_POST['tipo'];
			$cantidad=$cd->GuardarCD();
			echo $cantidad;*/
		# code...
		break;
	
	default:
		# code...
		break;
}


 ?>