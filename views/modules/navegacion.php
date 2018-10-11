<?php  
	if (isset($_GET["usuario"])) 
		$usuario= $_GET["usuario"];
?>


<nav>
	<ul>
		<li> <a href="index.php">Registro</a></li>
		<li> <a href="index.php?action=ingresar">Ingreso</a></li>
		<li><a href="index.php?action=usuarios=usuario=<?php echo($_GET['usuario']); ?>">Usuarios</a></li>		
		<li> <a href="index.php?action=salir">Salir</a></li>
	</ul>
</nav>