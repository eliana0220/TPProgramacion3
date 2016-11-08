<?php 


	class Importes
	{

		public $patente;
		public $hora_ingreso;
		public $hora_egreso;
		public $tarifa;
		public $importe_cobrado;
		public $playero;
		
		/*function __construct(argument)
		{
			# code...
		}*/

		/*public static function calcula_tiempo($start_time, $end_time) 
		{ 
    		$total_seconds 		= strtotime($end_time) - strtotime($start_time); 
    		$horas              = floor ( $total_seconds / 3600 );
    		$minutes            = ( ( $total_seconds / 60 ) % 60 );
    		$seconds            = ( $total_seconds % 60 );
     
    		$time['horas']      = str_pad( $horas, 2, "0", STR_PAD_LEFT );
    		$time['minutes']    = str_pad( $minutes, 2, "0", STR_PAD_LEFT );
    		$time['seconds']    = str_pad( $seconds, 2, "0", STR_PAD_LEFT );
     
    		$time               = implode( ':', $time );
     
    		return $time;
		}*/

		public static function TraerListaImportes()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("select patente, hora_ingreso, hora_egreso, tarifa, 		
																importe_cobrado, playero 
																from importes ");
				$consulta->execute();
				$lista = $consulta->fetchAll();
				return $lista;
		} //cierre función TraerListaImportes

		public static function GrillaImportes()
		{
			$listaImportes = Importes:: TraerListaImportes();


			$grilla = '<table class="table">
							<tr>
								<th>  PATENTE     		 </th>
								<th>  HORA INGRESO    	 </th>	
								<th>  HORA EGRESO  		 </th>								
								<th>  TARIFA             </th>
								<th>  IMPORTE COBRADO    </th>
								<th>  PLAYERO			 </th>	
							</tr>';   

			foreach ($listaImportes as $a)
			{
				
		
				$grilla .= "<tr>
								<td>".$a["patente"].          "</td>
								<td>".$a["hora_ingreso"].     "</td>
								<td>".$a["hora_egreso"].		"</td>
								<td>".$a["tarifa"].	        "</td>
								<td>".$a["importe_cobrado"].  "</td>
								<td>".$a["playero"].  	    "</td>
							</tr>";
			}
		
			$grilla .= '</table>';		
		
			return $grilla;

		} //cierre función GrillaImportes

		public static function AgregarImporte($patente, $hora_ingreso, $hora_egreso, $tarifa, $importe_cobrado, $playero)
		{
			$insert = "insert importes values ( "."'".$patente."'".","
													."'".$hora_ingreso."'".","
													."'".$hora_egreso."'".","
													."'".$tarifa."'".","
													."'".$importe_cobrado."'".","
													."'".$playero."'".")";
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta($insert);
			$consulta->execute();
			return $consulta;
		} //cierre función AgregarImporte



	} // cierre de clase

 ?>