<?php
  require_once __DIR__ . '/../errors.php';
  session_start();
  if (empty($_SESSION['admin']) || $_SESSION['admin'] == 'false') {
    header('Location: ../index.php');
    exit();
  }
  
  require_once __DIR__ . '/../models/equipo.php';
  require_once __DIR__ . '/../models/departamentos.php';
  require_once __DIR__ . '/../models/propietario.php';

  include('header.php');
  $equipo_obj = new Equipo();
  $dep_obj = new Departamentos();
  $propietario_obj = new Propietario();
?>
<body>
  <div class="container">
      <h2>Nuevo equipo</h2>
      <form action="/mantenimiento/controllers/equipo.php" method="post">
          <div class="form-group">
              <label for="serie">Serie:</label>
              <input type="text" class="form-control" name="new_serie" id="serie">
          </div>
          <br>
          <div class="form-group">
              <label for="marca">Marca:</label>
              <input type="text" class="form-control" name="new_marca" id="marca">
          </div>
          <br>
          <div class="form-group">
              <label for="departamento">Departamento:</label>
              <select class="form-select" name="new_departamento">
                <?php
                  $dep_obj->llenar_cbo();
                ?>
              </select>
          </div>
          <br>
          <div class="form-group">
              <label for="usuario">Usuario:</label>
              <select class="form-select" name="new_usuario">
                <?php
                  $propietario_obj->llenar_cbo_usuario();
                ?>
              </select>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
  </div>
  <hr>
  <div class="container">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Serie</th>
          <th>Marca</th>
          <th>Departamento</th>
          <th>Propietario</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $equipo_obj->llenar_tabla();
        ?>
      </tbody>
    </table>
  </div>
</body>
<?php
    include('../footer.php');
?>