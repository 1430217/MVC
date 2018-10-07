<?php

	class MvcController{

		public function pagina(){
			include "views/template.php";
		}

		public function enlacesPaginasController(){

			if(isset( $_GET['action']))
				$enlaces = $_GET['action'];

			else
				$enlaces = "index";

			$stmt = EnlacesPaginas::enlacesPaginasModel($enlaces);
			include $stmt;
		}

		//Controller para hacer el registro de los usuarios
		public function registrarUsuarioController(){

			if (isset($_POST['usuario'])) {
				$usuario = array('usuario' => $_POST['usuario'],
								'password' => $_POST['password'],
								'email' => $_POST['email']
				);

				//Recibe el usuario como un array y el nombre de la tabla
				$stmt = Datos::registrarUsuarioModel($usuario, 'usuarios'); 

				//Si el registro es exitoso regresa al formulario si no al index
				if($stmt == "success")
					header("location:index.php?action=ok");
				else 
					header("location:index.php");
			}		
		}

		//Controller para realizar el login del usuario
		public function login(){

			if (isset($_POST['usuario'])) {
				$usuario = array('usuario' => $_POST['usuario'],
								'password' => $_POST['password']
				);
				//Recibe el usuario como un array y el nombre de la tabla
				$stmt = Datos::loginModel($usuario, 'usuarios');

				//Si los datos coinciden con los de la base de datos entonces se inicia la sesion
				if($_POST['usuario'] == $stmt['usuario'] 
					&&  $_POST['password'] == $stmt['password']){ 

					//Se inicia la sesion y se redirecciona al listado de usuarios
					session_start();
					$_SESSION['sesion'] = true;
					header('location:index.php?action=usuarios');
				} 
				else 
					header('location:index.php?action=fallo');
			}

		}

		//Controller para borrar un usuario
		public function borrarUsuarioController(){
			if (isset($_GET['id'])) {

				$stmt = Datos::deleteUser($_GET['id'], 'usuarios');
	
				//Si la acion se realizó con exito se regresa al listado de usuarios
				if($stmt == "success")
					header("location:index.php?action=usuarios");
				else 
					echo 'Error al eliminar usuario';
			}	
		}

		//Controller para imprimir los usuarios de la base de datos en una tabla
		public function getUsersController(){
			$stmt = Datos::getUsers('usuarios');

			//For each para recorrer la tabla de los usuarios y poder imprimirlos
			foreach ($stmt as $usuario => $r) {
				//Echo para imprimir los datos en la tabla del listado de usuarios
				echo 
					'<tr>
						<td>'.$r["usuario"].'</td>
						<td>'.$r["password"].'</td>
						<td>'.$r["email"].'</td>
						<td><a href="index.php?action=editar&id='.$r["id"].'"><button>Editar</button></a></td>
						<td><a href="index.php?action=usuarios&id='.$r["id"].'"><button>Borrar</button></a></td>
					</tr>'
				;
			}		
		}

		//Controller para actualizar los datos del usuario
		public function actualizarUsuarioController(){

			if (isset($_POST['id'])) {
				$usuario = array('id' => $_POST['id'],
							'usuario' => $_POST['usuario'],
							'password' => $_POST['password'],
							'email' => $_POST['email']
				);
				//Recibe el usuario como un array y el nombre de la tabla
				$stmt = Datos::actualizarUsuarioModel($usuario, 'usuarios');

				if($stmt == "success")
					header("location:index.php?action=cambio");
				else
					echo 'Error al actualizar';
				
			}
		}

		//Controller para buscar a un usuario
		public function buscarUsuarioController(){

			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				//Recibe el id delusuario y el nombre de la tabla
				$stmt = Datos::buscarUsuario($id, 'usuarios');

				//Echo que imprime los datos en el formulario del usuario que se buscó en la base de datos
				echo '<input type="hidden" name="id" value="'.$stmt["id"].'"> 
					<input type="text" value="'.$stmt["usuario"].'" name="usuario" required>
					<input type="text" value="'.$stmt["password"].'" name="password" required>
					<input type="email" value="'.$stmt["email"].'" name="email" required>
					<input type="submit" value="Actualizar">';
			}
		}
	
	}
?>