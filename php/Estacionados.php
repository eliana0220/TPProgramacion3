<?php 
	
	require_once 'Importes.php';
	class Estacionados
	{

		public $patente;
		public $hora_ingreso;
		public $playero;


		public static function IngresarAuto($patente, $playero)
		{
			$hoy = getdate();
			if (strlen($hoy['mon'])<2) 
			{
				$hoy['mon'] = "0".$hoy['mon'];
			}
			if (strlen($hoy['mday'])<2) 
			{
				$hoy['mday'] = "0".$hoy['mday'];
			}

			$fecha_hora = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO estacionados
															( patente, hora_ingreso, playero) 
															VALUES ($patente,$fecha_hora,$playero)");
			$consulta->execute();
		} //cierre función IngresarAuto

		public static function TraerAuto($patente) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select patente, hora_ingreso, playero
															from estacionados 
															where patente = $patente");
			$consulta->execute();
			return $consulta;
			//$cdBuscado= $consulta->fetchObject('cd');
			//return $cdBuscado;			

		} //cierre función TraerAuto

		public static function TraerListaAutos()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("select patente, hora_ingreso, playero 
															from estacionados ");
				$consulta->execute();
				return $consulta;
		} //cierre función TraerListaAutos

		public static function BorrarAuto($patente)
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("delete patente, hora_ingreso, playero 
															from estacionados
															where patente = $patente");

		} //cierre función BorrarAuto

		public static function SacarAuto($patente)
		{
			$auto = Estacionados:: TraerAuto($patente);
			$importe = Importes:: Cobrar($auto);
			Estacionados:: BorrarAuto($patente);
			return $importe;
		} //cierre función SacarAuto

		public static function GrillaEstacionados()
		{
			$listaEstacionados = Estacionados:: TraerListaAutos();

			$grilla = '<table class="table">
							<tr>
								<th>  PATENTE     		   </th>
								<th>  HORA DE INGRESO    	</th>	
								<th>  PLAYERO  			   </th>	
							</tr>';   

			foreach ($listaEstacionados as $a)
			{
				$auto = array();
				$auto["patente"] = $a->patente;
				$auto["hora_ingreso"] = $a->hora_ingreso;
				$auto["playero"] = $a->playero;
				$auto = json_encode($auto);
		
				$grilla .= "<tr>
								<td>".$a->patente.    "</td>
								<td>".$a->hora_ingreso.      "</td>
								<td>".$a->playero.		"</td>
							</tr>";
			}
		
			$grilla .= '</table>';		
		
			return $grilla;

		} //cierre función GrillaEstacionados


	} //cierre de clase


 ?>