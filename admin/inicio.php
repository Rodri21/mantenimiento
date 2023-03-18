<?php
    require_once __DIR__ . '/../errors.php';
    session_start();
    if (empty($_SESSION['admin']) || $_SESSION['admin'] == 'false') {
      header('Location: ../index.php');
      exit();
    }
  
    require_once('../models/departamentos.php');
    require_once('../models/equipo.php');
    require_once('../models/usuario.php');
    require_once('../models/historial_mantenimiento.php');

    $dep_obj = new Departamentos();
    $equipo_obj = new Equipo();
    $usuario_obj = new Usuario();
    $hist_obj = new HistorialMantenimiento();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de mantenimiento</title>
  <!-- Incluimos los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<?php
    include('header.php');
?><br>
<body>
  <div class="container">
    <h1>Mantenimiento</h1>
    <hr>
    <form method='post' action="../controllers/historial_mantenimiento.php">
      <div class="row">
        <!-- Columna 1 -->
        <div class="col-md-6">
            <div class="mb-3">
              <label for="departamento" class="form-label">Departamento</label>
              <select class="form-select" name="departamento">
                <?php
                  $dep_obj->llenar_cbo();
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="equipo" class="form-label">Equipo</label>
              <select class="form-select" name="equipo">
                <?php
                  $equipo_obj->llenar_cbo();
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="usuario" class="form-label">Usuario</label>
              <input type="text" class="form-control" name="usuario">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
        </div>

        <!-- Columna 2 -->
        <div class="col-md-6">
            <div class="mb-3">
              <label for="fecha-mtto" class="form-label">Fecha de mantenimiento</label>
              <input type="date" class="form-control" name="fecha-mtto">
            </div>
            <div class="mb-3">
              <label for="encargado" class="form-label">Encargado</label>
              <select class="form-select" name="encargado">
                <?php
                  $usuario_obj->llenar_cbo();
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="tipo-mtto" class="form-label">Tipo de mantenimiento</label>
              <select class="form-select" name="tipo-mtto">
                <option value="Preventivo">Preventivo</option>
                <option value="Correctivo">Correctivo</option>
              </select>
            </div>
            <input type="text" name="admin" value="true" hidden>
            <div class="row">
              <div class="col-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
              <div class="col-2">
                <button class="btn btn-primary" onclick="window.location.href = '../report.php';">Reporte</button>
              </div>
            </div>
        </div>
      </div>
    </form>
  </div>

  <hr>

  <div class="container">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Equipo</th>
          <th>Fecha_esp</th>
          <th>Fecha_real</th>
          <th>Observaciones</th>
          <th>Usuario</th>
          <th>Tipo</th>
          <th>Herramientas</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $hist_obj->llenar_tabla();
        ?>
      </tbody>
    </table>
  </div>
</body>
<?php
    include('../footer.php');
?>