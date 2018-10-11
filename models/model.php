<?php 

	class EnlacesPaginas{
		
		public function enlacesPaginasModel($enlaces){
			if (isset($_GET['usuario'])) {
				$usuario= $_GET['usuario'];

				if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" 
					|| $enlaces == "confirmar" || $enlaces == "salir")
					$module =  "views/modules/".$enlaces.".php";
				
			}

			else if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" 
				|| $enlaces == "confirmar" || $enlaces == "salir"){
					$module =  "views/modules/".$enlaces.".php";
			} 
			else if($enlaces == "index"){$module =  "views/modules/registro.php"; } 
			else if($enlaces == "ok"){ $module =  "views/modules/ingresar.php"; } 
			else if($enlaces == "fallo"){ $module =  "views/modules/ingresar.php"; } 
			else if($enlaces == "cambio"){ $module =  "views/modules/usuarios.php"; } 
			else{ $module =  "views/modules/ingresar.php"; }
				return $module;
		}

	}

?>