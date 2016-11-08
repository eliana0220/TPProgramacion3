<?php 

class Usuario
{
	public $usuario;
	public $clave;
	public $nombre;
	public $apellido;
	public $tipo;

	
	/*function __construct(argument)
	{
		# code...
	}*/

	public static function TraerUsuario($usuario,$clave) 
	{		
			$consulta = "select usuario, clave, nombre, apellido, tipo 
					    from usuario where usuario = '".$usuario."'"."and clave = '".
					    $clave."'";
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta($consulta);
			$test = $consulta->execute();
			$test = $consulta->fetchAll();
			return $test;
			//$cdBuscado= $consulta->fetchObject('cd');
			//return $cdBuscado;			

	} //cierre función TraerUsuario

	public static function TraerTodosUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select usuario, clave, nombre, apellido, tipo from usuario");
			$lista = $consulta->execute();
			$lista = $consulta->fetchAll();
			return $lista;
	} //cierre función TraerTodosUsuarios

	public static function GrillaUsuarios()
	{
		$listaUsuarios = Usuario:: TraerTodosUsuarios();
		$grilla = '<table class="table">
							<tr>
								<th>  USUARIO     		   </th>
								<th>  CLAVE    	 		   </th>	
								<th>  NOMBRE  			   </th>								
								<th>  APELLIDO             </th>
								<th>  TIPO     	 	       </th>
								<th>  ACCION   	 	       </th>
							</tr>';   

			foreach ($listaUsuarios as $usr)
			{

				$usuario = "'".(string) $usr["usuario"]."'";

		
				$grilla .= '<tr>
								<td>'.$usr["usuario"].    '</td>
								<td>'.$usr["clave"].      '</td>
								<td>'.$usr["nombre"].	  '</td>
								<td>'.$usr["apellido"].	  '</td>
								<td>'.$usr["tipo"].  	  '</td>
								<?php if ($_SESSION["tipo"] == "admin") { ?>
								<td><input type="button" value="Eliminar" id="eliminar" 
									 onclick="BorrarUsuario('.$usuario.')"/>
								<input type="button" value="Modificar" id="Modificar" 
									 onclick="ModificarUsuario('.$usuario.')"/>
								</td> 
								<?php  } ?>
							</tr>';
			}
		
			$grilla .= '</table>';		
		
			//return $listaUsuarios;
			return $grilla;

	} //cierre función GrillaUsuarios


	public static function BorrarUsuario($usuario)
	{
		$consulta = "delete from usuario where usuario = "."'".$usuario."'"."";
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta($consulta);
			$consulta->execute();
	} //cierre función BorrarUsuario

	public static function GuardarUsuario($nombre, $apellido, $tipo, $usuario, $clave)
		{

			$insert = "insert usuario (nombre, apellido, tipo, usuario, clave) 
										values ( "."'".$nombre."'".",
												"."'".$apellido."'".",
												"."'".$tipo."'".",
												"."'".$usuario."'".",
												"."'".$clave."'".")";
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta($insert);
			$consulta->execute();
			return $consulta;
		} //cierre función GuardarUsuario

		public static function ModificarUsuario($usuario)
		{

			/*$insert = "insert usuarios values ( "."'".$nombre."'".",
												"."'".$apellido."'".",
												"."'".$tipo."'".",
												"."'".$usuario."'".",
												"."'".$clave."'".")";
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta($insert);
			$consulta->execute();
			return $consulta;*/
		} //cierre función GuardarUsuario


} //cierre clase 


 ?>