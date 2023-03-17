<?php
    session_start();
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
              <option selected>Seleccione una opción</option>
              <option value="departamento1">Departamento 1</option>
              <option value="departamento2">Departamento 2</option>
              <option value="departamento3">Departamento 3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="maquina" class="form-label">Máquina</label>
            <select class="form-select" id="maquina">
              <option selected>Seleccione una opción</option>
              <option value="maquina1">Máquina 1</option>
              <option value="maquina2">Máquina 2</option>
              <option value="maquina3">Máquina 3</option>
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
              <option selected>Seleccione una opción</option>
              <option value="encargado1">Encargado 1</option>
              <option value="encargado2">Encargado 2</option>
              <option value="encargado3">Encargado 3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="tipo-mtto" class="form-label">Tipo de mantenimiento</label>
            <select class="form-select" id="tipo-mtto">
              <option selected>Seleccione una opción</option>
              <option value="mtto1">Mantenimiento 1</option>
              <option value="mtto2">Mantenimiento 2</option>
              <option value="mtto3">M
              </select>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</div>
