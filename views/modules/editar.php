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
		$editar->buscarUsuarioController();
		$editar->actualizarUsuarioController();
	?>
</form>

