<?php 

	#Clase para la conexion a la base de datos
	class Conexion {
		public function conectar(){
			$link = new PDO('mysql:host=localhost; dbname=test', 'root', 'password');
			return $link;	
		}
	}
?>