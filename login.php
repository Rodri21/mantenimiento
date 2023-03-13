<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Obtiene las credenciales ingresadas por el usuario
	$usuario = $_POST['usuario'];
	$contraseña = $_POST['contraseña'];
    $user_id = 1;

	// Verifica si las credenciales son válidas
	if ($usuario == 'rodrigo' && $contraseña == '123') {
        // Después de comprobar las credenciales correctas
        // Guardar el ID del usuario en una variable de sesión
        $_SESSION['user_id'] = $user_id;

        // Redireccionar a la página de inicio
        header('Location: inicio.php');
		exit;
	} else {
		// Si las credenciales no son válidas, muestra un mensaje de error
		$error = 'Usuario o contraseña incorrectos';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
	<!-- Enlace al archivo CSS de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<h2 class="text-center mb-4">Iniciar sesión</h2>
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="usuario">Usuario:</label>
						<input type="text" name="usuario" id="usuario" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="contraseña">Contraseña:</label>
						<input type="password" name="contraseña" id="contraseña" class="form-control" required>
				
                        <div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Iniciar sesión</button>
					</div>
					<?php if (isset($error)): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $error; ?>
					</div>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>

	<!-- Enlaces a los archivos JS de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
