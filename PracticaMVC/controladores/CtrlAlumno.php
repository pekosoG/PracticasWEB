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
		private $cont;
			
		function __construct(){
			require("modelos/modAlumno.php");
			$this->modelo= new modAlumno();
			if(func_num_args()>0){
				$this->cont=func_get_arg(0);
			}
		}
		
		/**
		 * Metodo que ejecuta las peticiones de usuarios
		 */
		function ejecutar(){
			if(preg_match('/^[a-z]+$/',$this->cont['act'])===0)
				die("Act Rechazado!");

			if(isset($this->cont['act'])){
				switch ($this->cont['act']) {
					case 'alta':
						$this->alta();
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
			
			if(preg_match('/^[a-zA-Z]+[0-9]{4}\-[dD]{1}[0-9]{2}$/',$this->cont['curso'])===0)
				die("Curso Rechazado!");
			
			if(isset($this->cont['curso'])){
				$resultLista=$this->modelo->listaPorCurso($this->cont['curso']);
			}else{
				$resultLista=$this->modelo->listar();
			}
			//var_dump($resultLista);
			$vALista=new viewAlumnosLista();
			$vALista->mostrarLista($resultLista);
		}
		
		/**
		 * Funcion encargada de validar que los datos del alumno sean correctos 
		 * antes de enviarlo a la BD
		 */
		function alta(){
			$regexNombre="/^[a-zA-Z]+\s[^0-9]*[a-zA-Z]$/";
			$regexCorreo="/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
			$regexURL="/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/";
			$regexGitHub="/(https://github.com/)\w+$/";
			$regexCel="/^[0-9\+](\s{0,1}\-{0,1}[0-9])+$/";
			$regexCodig="/^[0-9a-zA-Z]{1}[0-9]+$/";
			$regexTexto="/\w+$/";
			$regexCarrera="/[0-9]{1}$/";			
			
			$alta=array();
			
			/*
			 * Comenzamos lasValidaciones
			 */
			//Primero validamos el nombre
			if(!isset($this->cont['nombre']))
				die('El nombre es requerido para dar de alta');
			else{
				if(preg_match($regexNombre,$this->cont['nombre'])===0)
					die('Nombre Invalido');
				else
					$alta['nombre']=$this->cont['nombre'];
			}
			
			//Validamos el Correo
			if(!isset($this->cont['correo']))
				die('El correo es requerido para dar de alta');
			else{
				if(preg_match($regexCorreo,$this->cont['correo'])===0)
					die('Correo Invalido');
				else
					$alta['correo']=$this->cont['correo'];
			}
			
			//validamos si existe URL
			if(isset($this->cont['url'])){
				if(preg_match($regexURL,$this->cont['url'])===0)
					die('URL Invalido');
				else
					$alta['url']=$this->cont['url'];
			}
			
			//Validamos si tiene GitHub
			if(isset($this->cont['github'])){
				if(preg_match($regexGitHub,$this->cont['github'])===0)
					die('GitHub Invalido');
				else
					$alta['github']=$this->cont['github'];
			}

			//Validamos el Celular
			if(isset($this->cont['cel'])){
				if(preg_match($regexCel,$this->cont['cel'])===0)
					die('Celular Invalido Invalido');
				else
					array_push($alta,$this->cont['cel']);
			}
			
			//Validamos si tiene codigo
			if(!isset($this->cont['codigo']))
				die('El codigo es requerido para dar de alta');
			else{
				if(preg_match($regexCodig,$this->cont['codigo'])===0)
					die('Codigo Invalido');
				else
					$alta['codigo']=$this->cont['codigo'];
			}
			
			//Validamos el Equipo
			if(isset($this->cont['equipo'])){
				if(preg_match($regexTexto,$this->cont['equipo'])===0)
					die('Equipo Invalido Invalido');
				else
					$alta['equipo']=$this->cont['equipo'];
			}
			
			//Validamos la Carrera
			if(!isset($this->cont['carrera']))
				die('La carrera es requerida para dar de alta');
			else{
				if(preg_match($regexTexto,$this->cont['carrera'])===0)
					die('Carrera Invalida');
				else
					$alta['carrera']=$this->cont['carrera'];
			}
			
			$this->modelo->altaAlumno($alta);
		}
		
	 }
?>