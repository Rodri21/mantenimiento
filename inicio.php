<?php
session_start();

if (!isset($_SESSION['user_id'])) {
	// Redireccionar al usuario a la página de inicio de sesión
	header('Location: login.php');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Página de inicio</title>
</head>
<body>
	<h1>Bienvenido a mi sitio web</h1>
	<p>Este es un sitio web sencillo creado con PHP y HTML. Aquí puedes encontrar información sobre diferentes temas, noticias, artículos de opinión, entre otras cosas.</p>

    <!-- Botón para cerrar sesión -->
	<div class="text-center">
		<a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
	</div>
</body>
</html>
