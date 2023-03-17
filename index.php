<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
</head>
<body>
	<?php
	require_once('config.php');
	include('header.php');
	?>
    <div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<h2 class="text-center mb-4">Iniciar sesión</h2>
                <hr>
				<form action="login.php" method="post">
					<div class="form-group">
						<label for="usuario">Usuario:</label>
						<input type="text" name="usuario" id="usuario" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="contrasena">Contrasena:</label>
						<input type="password" name="contrasena" id="contrasena" class="form-control" required>
					</div>
                    <br>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Iniciar sesión</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    
</body>
</html>
