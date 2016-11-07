<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../php/AccesoDatos.php');
	require_once('../php/Login.php');
	require_once('../php/Usuario.php');
	
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:wsPdo'); 

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'

  
	//$server->register( 
	/*'ObtenerTodosLosCds',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosCds',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los Cds de la Base de Datos'    	
					);


	function ObtenerTodosLosCds() {
		
		return Cd::TraerTodos(); } */

	//function ValidarUsuario($usuario)
	//{
	//	return Login::ValidarUsuario($usuario);
	//}
		
		var_dump("llegue al WS");
		echo "llegue al WS";
		return "llegue al WS";
		//$server->register("ValidarUsuario")
		
	
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
