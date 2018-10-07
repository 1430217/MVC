<?php 
	session_start();
	if (!$_SESSION['sesion']) {
		header('location:index.php?action=ingresar');
		exit();
	}
?>

<h1>Editar usuario</h1>

<form method="post">
	<?php 
		$editar = new MvcController();
		$editar->buscarUsuarioController(); //Se llama la funcion del controller para buscar un usuario
		$editar->actualizarUsuarioController(); //Funcion para actualizar el usuario
	?>
</form>

