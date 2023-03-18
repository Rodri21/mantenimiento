<?php
    require_once __DIR__ . '/../errors.php';
    session_start();
    if (!isset($_SESSION['admin'])) {
      header('Location: ../../index.php');
      exit();
    } elseif ($_SESSION['admin']=='false') {
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
    <div class="row">
      <!-- Columna 1 -->
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <select class="form-select" id="departamento">
              <?php
                $dep_obj->llenar_cbo();
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="maquina" class="form-label">Máquina</label>
            <select class="form-select" id="maquina">
              <?php
                $equipo_obj->llenar_cbo();
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
          </div>
        </form>
      </div>

      <!-- Columna 2 -->
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="fecha-mtto" class="form-label">Fecha de mantenimiento</label>
            <input type="date" class="form-control" id="fecha-mtto">
          </div>
          <div class="mb-3">
            <label for="encargado" class="form-label">Encargado</label>
            <select class="form-select" id="encargado">
              <?php
                $usuario_obj->llenar_cbo();
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="tipo-mtto" class="form-label">Tipo de mantenimiento</label>
            <select class="form-select" id="tipo-mtto">
              <option value="mtto1">Preventivo</option>
              <option value="mtto2">Correctivo</option>
              </select>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
