<?php 

session_start();

require_once "Usuario.php";


	class Login 
	{
		public $usuario;
		public $clave;
		public $recordar;


		public static function ValidarUsuario($usuario)
		{
			$usuario=$_POST['usuario'];
			$clave=$_POST['clave'];
			$recordar=$_POST['recordarme'];

			$usr = Usuario::TraerUsuario($usuario); 
			return $usr;
		} // cierre de función ValidarUsuario




	} //cierre de clase





	




	/*if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}
	$_SESSION['registrado']="octavio";
	$retorno=" ingreso";
	echo $retorno;*/


 ?>