<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../php/AccesoDatos.php');
	require_once('../php/Login.php');
	require_once('../php/Usuario.php');
	require_once('../php/Estacionados.php');
	require_once('../php/Importes.php');
	


	//$server->configureWSDL('WebService Con PDO', 'urn:wsPdo'); 

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'

  
	/*'ObtenerTodosLosCds',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosCds',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los Cds de la Base de Datos'    	
					;*/


	function ValidarUsuario($usuario, $clave)
	{	
		return Login::ValidarUsuario($usuario,$clave); 
	}

	function GrillaEstacionados()
	{	
		//return Estacionados:: TraerListaAutos();
		return Estacionados:: GrillaEstacionados(); 
	}

	function IngresarAuto($patente, $playero)
	{	
		return Estacionados::IngresarAuto($patente, $playero); 
	}

	function SacarAuto($patente)
	{	
		return Estacionados::SacarAuto($patente);
	}
	
	function GrillaImportes()
	{	
		return Importes:: GrillaImportes(); 
	}	

	function GrillaUsuarios()
	{	
		return Usuario:: GrillaUsuarios(); 
	}		

	function GuardarUsuario($nombre, $apellido, $tipo, $usuario, $clave)
	{	
		return Usuario::GuardarUsuario($nombre, $apellido, $tipo, $usuario, $clave); 
	}

	function BorrarUsuario($usuario)
	{	
		return Usuario::BorrarUsuario($usuario);
	}

	function ModificarUsuario($usuario)
	{	
		return Usuario::ModificarUsuario($usuario);
	}
	
///**********************************************************************************************************///								

	//$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
    $server = new nusoap_server(); 
	$server->register("ValidarUsuario");
	$server->register("IngresarAuto");
	$server->register("GrillaEstacionados");
	$server->register("SacarAuto");
	$server->register("GrillaImportes");
	$server->register("GrillaUsuarios");
	$server->register("GuardarUsuario");
	$server->register("BorrarUsuario");
	$server->register("ModificarUsuario");
	$server->service($HTTP_RAW_POST_DATA);
?>