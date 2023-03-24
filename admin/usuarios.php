<?php
  require_once __DIR__ . '/../errors.php';
  session_start();
  if (empty($_SESSION['admin']) || $_SESSION['admin'] == 'false') {
    header('Location: ../index.php');
    exit();
  }
  include('header.php');

  require_once __DIR__ . '/../models/usuario_equipo.php';
  $propietario_obj = new Propietario();

?>
<body>
    <div class="container">
        <h2>Nuevo usuario</h2>
        <form action="database.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <br>
            <div class="form-group">
                <label for="ap_paterno">Apellido paterno:</label>
                <input type="text" class="form-control" name="ap_paterno" id="ap_paterno">
            </div>
            <br>
            <div class="form-group">
                <label for="ap_materno">Apellido materno:</label>
                <input type="text" class="form-control" name="ap_materno" id="ap_materno">
            </div>
            <br>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="text" class="form-control" name="correo" id="correo">
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
            <th>Nombre</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $propietario_obj->llenar_tabla();
            ?>
        </tbody>
        </table>
    </div>
</body>
<?php
    include('../footer.php');
?>