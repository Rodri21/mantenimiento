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

  require_once __DIR__ . '/../models/departamentos.php';

  include('header.php');
  $dep_obj = new Departamentos();
?>
<div class="container">
    <h2>Nuevo departamento</h2>
    <form action="database.php" method="post">
        <div class="form-group">
            <label for="departamento">Departamento</label>
            <input type="text" class="form-control" name="departamento" id="departamento">
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
        <th>Id</th>
        <th>Departamento</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $dep_obj->llenar_tabla();
      ?>
    </tbody>
  </table>
</div>


