<?php
	/**
	 * Modelo de Alumno
	 */
	class modAlumno{
		
		/**
		 * Metodo donde se supone que regresa el listado de todos los alumnos
		 * @return arreglo con lista de alumnos (contenida dentro de otro arreglo)
		 */
		function listar(){
			$arreglo= array(
				'titulo' => 'Lista General de Alumnos',
				'alumnos'=> array('Juan','Pepe','Ana','Maria','Nancy','Alex')
				);
			return $arreglo;
		}
		
		/**
		 * Metodo que recibe como parametro un curso especifico de alumnos que se quiere consultar
		 * @return arreglo con lista de alumnos (contenida dentro de otro arreglo)
		 */
		function listaPorCurso($curso){
			$arreglo= array(
				'titulo' => 'Lista de Curso '.$curso,
				'alumnos'=> array('Maria','Nancy','Alex')
				);
			return $arreglo;
		}
		
		/**
		 * Ordena el arreglo de los alumnos
		 */
		function ordenaAlumnos($arreglo){
			sort($arreglo['alumnos']);
			return $arreglo;
		}
	}
?>