<?php
	/**
	 * Controlador de Alumnos
	 * controlador encargado de manejar las
	  * peticiones de alumnos
	 * @author PekosoG (Israel Garcia)
	 * @version 0.5
	 */
	 class CtrlAlumno{
	 	private $modelo;
			
		function __construct(){
			require("modelos/modAlumno.php");
			$this->modelo= new modAlumno();
		}
		
		/**
		 * Metodo que ejecuta las peticiones de usuarios
		 */
		function ejecutar(){
			if(isset($_GET['act'])){
				switch ($_GET['act']) {
					case 'alta':
						//Hacemos el relajo para dar de Alta
						break;
					
					case 'listar':
						$this->listar();
						break;
					default:
						//Accion default en caso de que act sea diferente
						break;
				}
			}else
				die("No se envió una accion");
		}
		
		/**
		 * Funcion encargada de mostrar la lista solicitada en el GET.
		 * Esta lista puede ser de un curso en especifico o general 
		 */
		function listar(){
			require('vistas/viewALumnosLista.php');
			if(isset($_GET['curso'])){
				$resultLista=$this->modelo->listaPorCurso($_GET['curso']);
			}else{
				$resultLista=$this->modelo->listar();
			}
			//var_dump($resultLista);
			$vALista=new viewAlumnosLista();
			$vALista->mostrarLista($resultLista);
		}
		
	 }
?>