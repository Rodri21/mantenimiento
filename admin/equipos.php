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
  include('header.php');
?>
<div class="container">
    <h2>Nuevo equipo</h2>
    <form action="database.php" method="post">
        <div class="form-group">
            <label for="serie">Serie:</label>
            <input type="text" class="form-control" name="serie" id="serie">
        </div>
        <br>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" name="marca" id="marca">
        </div>
        <br>
        <div class="form-group">
            <label for="departamento">Departamento:</label>
            <select class="form-select" id="departamento">
              <option selected>Seleccione una opción</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <select class="form-select" id="usuario">
              <option selected>Seleccione una opción</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
