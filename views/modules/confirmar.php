<!-- Pagina para confirmar la contraseña y que se elimine el registro-->
<?php 
	session_start();
	if (!$_SESSION['sesion']) {
		header('location:index.php?action=ingresar');
		exit();
	}
?>

<h1>Confirmar contraseña</h1>

<form method="POST">
    <label>Confirmar contraseña:</label>
    <input type="password" name="password" placeholder="Contraseña">
    <input type="submit" value="Confirmar">
</form>

<?php
    $borrar = new MvcController();
    $borrar->getPasswordController();
?>