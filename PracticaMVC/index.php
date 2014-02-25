<?php
	/**
	 * Prueba de index para las peticiones
	 * @author PekosoG (Israel Garcia)
	 * @version 0.5 
	 */

	 if(isset($_GET['ctrl'])){
	 	$controlador=null;
		switch($_GET['ctrl']){
			case 'alumno':
				require('controladores\CtrlAlumno.php');
				$controlador = new CtrlAlumno();
				break;
			default:
				//Controlador Default, un 404 quiza?
				die("parametro mal!");
				break;
		}
		$controlador->ejecutar();	 	
	 }else
	 	die("Nuu-uuuhh...!");
?>