/*
 Una clase con manejador de las tablas, se pueden recibir o no parametros que me indican 
 cuantas tablas y hasta que numero. 
 */
<?php

	class tabla{
		
		private $limTabla;
		private $limMulti;
		
		function __construct(){
			$this->limTabla=12;
			$this->limMulti=12;
			if(func_num_args()>0){
				$arreglo=func_get_args();
				$arreglo=$arreglo[0];
				if(array_key_exists('limTabla',$arreglo))
					$this->limTabla=$arreglo['limTabla'];
				if(array_key_exists('limMulti',$arreglo))
					$this->limMulti=$arreglo['limMulti'];
			}
		}
		
	 	public function imprimeTablas(){
			for($i=1;$i<=$this->limTabla;$i++){
				echo 'Tabla del ',$i,'</br>';
				for($j=1;$j<=$this->limMulti;$j++){
					echo $i,'x',$j,'=',$i*$j,'</br>';
				}
				echo '</br>';
			}
		}
	}
	
	var_dump($_GET);
	$tabla= new tabla($_GET);
	$tabla->imprimeTablas();
?>