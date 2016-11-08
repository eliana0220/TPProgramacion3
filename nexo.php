<?php 
session_start();
require_once('SERVIDOR/lib/nusoap.php');
require_once("php/AccesoDatos.php");
require_once("php/Login.php");
require_once("php/Usuario.php");
require_once("php/Estacionados.php");
require_once("php/Importes.php");

//2.- INDICAMOS URL DEL WEB SERVICE

		//REEMPLAZO
		$host = 'http://vera-eliana.esy.es/SERVIDOR/ws.php';
		
//3.- CREAMOS LA INSTANCIA COMO CLIENTE
		$client = new nusoap_client($host . '?wsdl');

//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
		$err = $client->getError();
		if ($err) {// MOSTRAMOS EL ERROR.
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}


$accion=$_POST['accion'];

switch ($accion) 
{
	case 'Ingresar':
			//INVOCO AL METODO DE MI WS		
			$login = $client->call('ValidarUsuario', array("usuario" => $_POST['usuario'],"clave" => $_POST['clave']));
			//var_dump($login);
			$_SESSION['registrado']=$_POST['usuario'];
			$_SESSION['tipo']=$login;
		break;


	case 'setCookie':
			if($_POST['recordarme'] == 'true')
			{
			   	//var_dump('vacio');
				setcookie("usuario",$_POST['usuario'], time() + (86400 * 30), "/");
				setcookie("clave",$_POST['clave'], time() + (86400 * 30), "/");
			}
		break;

	case 'Estacionar':
	    $return = $client->call('IngresarAuto', array("patente" => $_POST['patente'],"playero" => $_POST['playero']));
	    var_dump($return);
		break;
	
	case 'GrillaEstacionados':
			$listaEstacionados = $client->call('GrillaEstacionados');
			echo $listaEstacionados;
		break;

	case 'Sacar':
		$return = $client->call('SacarAuto', array("patente" => $_POST['patente']));
	    echo($return);
		break;

	case 'GrillaImportes':
			$listaImportes = $client->call('GrillaImportes');
			echo($listaImportes);
		break;

	case 'GrillaUsuarios':
			$listaUsuarios = $client->call('GrillaUsuarios');
			echo($listaUsuarios);
			//echo $listaUsuarios;
		break;

	case 'GuardarUsuario':
	    $return = $client->call('GuardarUsuario', array("nombre" => $_POST['nombre'],
	    												"apellido" => $_POST['apellido'],
	    												"tipo" => $_POST['tipo'],
	    												"usuario" => $_POST['usuario'],
	    												"clave" => $_POST['clave']));
	    echo($return);
		break;

	case 'BorrarUsuario':
		$return = $client->call('BorrarUsuario', array("usuario" => $_POST['usuario']));
	    echo($return);
		break;

	case 'ModificarUsuario':
		$return = $client->call('ModificarUsuario', array("usuario" => $_POST['usuario']));
	    echo($return);
		break;

	case 'Desloguear':
		session_destroy();
		break;
		
	default:
		# code...
		break;
}


 ?>