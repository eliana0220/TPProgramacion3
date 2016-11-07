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

	public static function TraerUsuario($usuario) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select usuario, clave, nombre, apellido, tipo 
															from usuario 
															where usuario = $usuario");
			$consulta->execute();
			return $consulta;
			//$cdBuscado= $consulta->fetchObject('cd');
			//return $cdBuscado;			

	} //cierre función TraerUsuario

	public static function TraerTodosUsuarios()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select usuario, clave, nombre, apellido, tipo 
															from usuario");
			$consulta->execute();
			return $consulta;
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
								<th>					   </th>	
							</tr>';   

			foreach ($listaUsuarios as $usr)
			{
				$usuario = array();
				$usuario["usuario"] = $usr->usuario;
				$usuario["clave"] = $usr->clave;
				$usuario["nombre"] = $usr->nombre;
				$usuario["apellido"] = $usr->apellido;
				$usuario["tipo"] = $usr->tipo;
				$usuario = json_encode($usuario);
		
				$grilla .= "<tr>
								<td>".$usr->usuario.    "</td>
								<td>".$usr->clave.      "</td>
								<td>".$usr->nombre.		"</td>
								<td>".$usr->apellido.	"</td>
								<td>".$usr->tipo.  	    "</td>
								<td><input type='button' value='Eliminar' id='eliminar' onclick='BorrarUsuario($usuario)' />
								<input type='button' value='Modificar' id='Modificar' onclick='ModificarUsuario($usuario)' />
								</td>
							</tr>";
			}
		
			$grilla .= '</table>';		
		
			return $grilla;

	} //cierre función GrillaUsuarios


	public static function BorrarUsuario($usuario)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("delete usuario, clave, nombre, apellido, tipo 
															from usuario 
															where usuario = $usuario");

	} //cierre función BorrarUsuario

} //cierre clase 


 ?>