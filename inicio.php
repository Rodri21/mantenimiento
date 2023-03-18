<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
      header('Location: index.php');
      exit();
    }

    require_once __DIR__ . '/errors.php';

    require_once('models/departamentos.php');
    require_once('models/equipo.php');
    require_once('models/usuario.php');
    require_once('models/historial_mantenimiento.php');

    $dep_obj = new Departamentos();
    $equipo_obj = new Equipo();
    $usuario_obj = new Usuario();
    $hist_obj = new HistorialMantenimiento();

    include('header.php');
?>
<br><br>
<body>
  <div class="container">
    <h1>Mantenimiento</h1> <hr/> <br/>
    <form method='post' action='controllers/historial_mantenimiento.php'>
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
            <select class="form-select" name="usuario">
              <?php
                $usuario_obj->llenar_cbo();
              ?>
            </select>
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
            <div class="form-floating">
              <textarea class="form-control" name="observaciones" name="observaciones" rows="5" style="height: 100px; white-space: pre-wrap;"></textarea>
              <label for="observaciones">Observaciones</label>
            </div>
          </div>
          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control" name="herramientas" name="herramientas" rows="5" style="height: 100px; white-space: pre-wrap;"></textarea>
              <label for="herramientas">Herramientas utilizadas</label>
            </div>
          </div>
          <input type="text" name="admin" value="false" hidden>
          <div class="row">
            <div class="col-2">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <div class="col-2">
              <button class="btn btn-primary" onclick="window.location.href = 'report.php';">Reporte</button>
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
        <th>Personal</th>
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
    include('footer.php');
?>