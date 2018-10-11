<?php 
	session_start();
	if (!$_SESSION['sesion']) {
		header('location:index.php?action=ingresar');
		exit();

		if (isset($_GET['usuario']))
			$usuario= $_GET['usuario'];
	
	}
?>

<h1>Listado de usuarios</h1>

<table  style="border: 2px solid #ddd; border-radius:5px">		
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Contraseña</th>
			<th>Email</th>
			<th></th>  <!-- Boton de eliminar -->
			<th></th> <!-- Boton de modificar -->
		</tr>
	</thead>
	<tbody>
		<?php 
			$listaUsuarios = new MvcController();
			$listaUsuarios->getUsersController();
			//$listaUsuarios->borrarUsuarioController();
		?>
	</tbody>
</table>

<?php
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'cambio') 
			echo 'Ha actualizado los datos del usuario';
	}
?>