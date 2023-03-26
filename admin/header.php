<?php
  require_once __DIR__ . '/../errors.php';
  if (empty($_SESSION['admin']) || $_SESSION['admin'] == 'false') {
	header('Location: ../index.php');
	exit();
  }
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Mantenimiento</title>
	<base href="mantenimiento">
	<!-- Enlaces de los archivos de Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<!-- Navbar de Bootstrap -->
	<nav class="navbar navbar-expand-lg text-white navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="/mantenimiento/admin/inicio.php">Mantenimiento</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/mantenimiento/admin/inicio.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/mantenimiento/admin/departamentos.php">Departamentos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/mantenimiento/admin/equipos.php">Equipos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/mantenimiento/admin/propietarios.php">Propietarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/mantenimiento/admin/usuarios.php">Encargados</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/mantenimiento/logout.php">Cerrar sesion</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
</body>

</html>
