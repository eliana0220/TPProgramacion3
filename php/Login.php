<?php 

//session_start();

require_once "Usuario.php";


	class Login 
	{
		public $usuario;
		public $clave;
		public $recordar;


		public static function ValidarUsuario($usuario,$clave)
		{
			$consulta = Usuario::TraerUsuario($usuario,$clave);
			$tipo = $consulta[0]['tipo'];
			return $tipo;
		} // cierre de función ValidarUsuario


	} //cierre de clase


 ?>