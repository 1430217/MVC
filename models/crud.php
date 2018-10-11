<?php 

	require_once "conexion.php";

	class Datos extends Conexion{
		
		public function registrarUsuarioModel($usuario, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, email, password) VALUES (:usuario, :email, :password)");
			$stmt->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
			$stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
			$stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);

			if ($stmt->execute()) 
				return 'success';
			else 
				return 'error';	

			$stmt->close();
		}
		//Funcion para el login del usuario
		public function loginModel($usuario, $tabla){
			
			$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
			$stmt->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);		
			$stmt->execute();
			return $stmt->fetch();

			$stmt->close();
		}

		//Funcion para traer los usuarios de la base de datos
		public function getUsers($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();
		}

		//Funcion para actualizar el usuario
		public function actualizarUsuarioModel($usuario, $tabla){
			
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, email = :email,password = :password WHERE id = :id");		
			$stmt->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
			$stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
			$stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
			$stmt->bindParam(':id', $usuario['id'], PDO::PARAM_INT);

			if ($stmt->execute()) 
				return 'success';
			else 
				return 'error';

			$stmt->close();
		}

		//Funcion para hacer una busqueda por el id del usuario
		public function buscarUsuario($id, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id = :id");
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();

			$stmt->close();
		}

		//Funcion para borrar un usuario de la tabla
		public function deleteUser($id, $tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id = :id");
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();

			if ($stmt->execute()) 
				return 'success';
			else 
				return 'error';

			$stmt->close();
		}

		public function getPassword($usuario, $tabla){
			$db = Conexion::conectar();
			$stmt= $db->prepare("SELECT password FROM $tabla WHERE usuario = :usuario");
			$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch();
			$stmt->close();
		}
	}

?>