<?php 
	
	require_once 'Importes.php';
	
	class Estacionados
	{

		public $patente;
		public $hora_ingreso;
		public $playero;


		public static function IngresarAuto($patente, $playero)
		{
			
			$fecha_hora = Estacionados:: ObtenerFechaHora();

			$insert = "insert estacionados values ( "."'".$patente."'".","."'".$fecha_hora."'".","."'".$playero."'".")";
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta($insert);
			$consulta->execute();
			return $consulta;
		} //cierre función IngresarAuto

		public static function TraerAuto($patente) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select patente, hora_ingreso, playero
															from estacionados 
															where patente = "."'".$patente."'"."");
			$consulta->execute();
			$auto = $consulta->fetchAll();
			return $auto;	

		} //cierre función TraerAuto

		public static function TraerListaAutos()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("select patente, hora_ingreso, playero from estacionados");
				$lista = $consulta->execute();
				$lista = $consulta->fetchAll();
				return $lista;

		} //cierre función TraerListaAutos

		public static function BorrarAuto($patente)
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("delete from estacionados
															where patente = "."'".$patente."'"."");
				$lista = $consulta->execute();
		} //cierre función BorrarAuto

		public static function Cobrar($patente, $hora_ingreso)
		{	

			$hora_egreso = Estacionados:: ObtenerFechaHora();
			$ingreso = new DateTime($hora_ingreso);
			$egreso  = new DateTime($hora_egreso);
			$diferencia = $egreso->diff($ingreso);
			$precio = $diferencia->format('%H') * 36;
			$precio = $precio + $diferencia->format('%I') * 36 / 60;
			return $precio;
		} //cierre función Cobrar

		public static function SacarAuto($patente)
		{
			$auto = Estacionados:: TraerAuto($patente);
			Estacionados:: BorrarAuto($patente);
			$cobrar = Estacionados:: Cobrar($auto[0]["patente"], $auto[0]["hora_ingreso"]);
			$hora_egreso = Estacionados:: ObtenerFechaHora();
			$tarifa = "36";
			$importe_cobrado = $cobrar;
			$seAgrego = Importes:: AgregarImporte($auto[0]["patente"] ,
									  			  $auto[0]["hora_ingreso"] ,
									  			  $hora_egreso, 
									  			  $tarifa, 
									  			  $importe_cobrado, 
									  			  $auto[0]["playero"]);
			return 'PRECIO: $'.$cobrar;
			
		} //cierre función SacarAuto

		public static function GrillaEstacionados()
		{
			$listaEstacionados = Estacionados:: TraerListaAutos();	
			$grilla = '<table class="responstable">
							<tr>
								<th>  PATENTE     		   </th>
								<th>  HORA DE INGRESO      </th>	
								<th>  PLAYERO  			   </th>	
							</tr>';   

			foreach ($listaEstacionados as $a)
			{
				$auto = array();
				$auto["patente"] = $a["patente"];
				$auto["hora_ingreso"] = $a["hora_ingreso"];
				$auto["playero"] = $a["playero"];
				$auto = json_encode($auto);
		
				$grilla .= "<tr>
								<td>".$a["patente"].       "</td>
								<td>".$a["hora_ingreso"].  "</td>
								<td>".$a["playero"].	   "</td>
							</tr>";
			}
		
			$grilla .= '</table>';		
		
			return $grilla;

		} //cierre función GrillaEstacionados

		public static function ObtenerFechaHora()
		{
			//se obtiene fecha y hora del sistema y se formatea
		   	$hoy = getdate();
			if (strlen($hoy['mon'])<2) 
			{
				$hoy['mon'] = "0".$hoy['mon'];
			}
			if (strlen($hoy['mday'])<2) 
			{
				$hoy['mday'] = "0".$hoy['mday'];
			}

			if (strlen($hoy['hours'])<2) 
			{
				$hoy['hours'] = "0".$hoy['hours'];
			}
			if (strlen($hoy['minutes'])<2) 
			{
				$hoy['minutes'] = "0".$hoy['minutes'];
			}
			if (strlen($hoy['seconds'])<2) 
			{
				$hoy['seconds'] = "0".$hoy['seconds'];
			}

			$fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
			$hora = $hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
			$fecha_hora = $fecha." ".$hora;
			return $fecha_hora;
		}


	} //cierre de clase


 ?>