<?php
	class viewAlumnosLista{
		
		/**
		 *Metodo que muestra la lista recibida por parametro
		 * @param $lista Arreglo con el titulo y lista(arreglo) de alumnos
		 */
		function mostrarLista($lista){
			//var_dump($lista);
			echo 'Titulo: ',$lista['titulo'],'</br>';
			echo 'Alumnos:</br>';
			$alumnos=$lista['alumnos'];
			//var_dump($alumnos);
			for($i=0;$i<count($alumnos);$i++)
				echo $i+1,'.- ',$alumnos[$i],'</br>';
		}
	}
?>