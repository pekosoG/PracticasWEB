<?php
	/**
	 * Prueba de index para las peticiones
	 * @author PekosoG (Israel Garcia)
	 * @version 0.5 
	 */
	
	//$cont=$_GET;
	//$_GET=null;
	//$contPost=$_POST;
	$cont=$_POST;
	 if(isset($cont['ctrl'])){
		
		if(preg_match('/^[a-z]+$/',$cont['ctrl'])===0)
			die("Ctrl Rechazado!");
		
	 	$controlador=null; 
		switch($cont['ctrl']){
			case 'alumno':
				require('controladores\CtrlAlumno.php');
				$controlador = new CtrlAlumno($cont);
				break;
			
			case 'curso':
				require('controladores\CtrlCurso.php');
				$controlador = new CtrlCurso($cont);
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