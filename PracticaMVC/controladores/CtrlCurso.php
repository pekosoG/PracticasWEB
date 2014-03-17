<?php

	/**
	 * Clase encargada de checar la informarmacion de 
	 * las fechas y demás
	 */
	class CtrlCurso{
		
		private $modelo;
		private $cont;
		function __construct(){
			//require("modelos/modCurso.php");
			//$this->modelo= new modAlumno();
			if(func_num_args()>0){
				$this->cont=func_get_arg(0);
			}
		}
		
		function ejecutar(){
			if(isset($this->cont['act'])){
				if(preg_match('/^[a-z]+$/',$this->cont['act'])===0)
					die("Act Rechazado!");
				
				switch($this->cont['act']){
					case 'consultdias':
						$this->consultaDias();
						break;
				}
			}
		}
		
		function consultaDias(){
			$fechaInicio=strtotime($this->cont['ini']);
			$fechaFinal=strtotime($this->cont['fin']);
			
			$dias=$this->cont['dias'];
			$semana= date('W',$fechaInicio);
			
			$contSemana=0;
			while($fechaInicio<$fechaFinal){
				echo date("d/m/y", strtotime("Monday $contSemana week")),'</br>';
				$fechaInicio=strtotime("Monday $contSemana week");
				$contSemana++;
			}
			
		}
	}
?>