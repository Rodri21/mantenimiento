<?php
    require_once __DIR__ . '/../errors.php';
    session_start();
    if (empty($_SESSION['admin']) || $_SESSION['admin'] == 'false') {
        header('Location: ../index.php');
        exit();
    }
    
    include('header.php');

    require_once __DIR__ . '/../models/usuario.php';
    $usuario_obj = new Usuario();
?>
<body>
    <div class="container">
        <h2>Nuevo personal de mantenimiento</h2>
        <form action="database.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <br>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
            <br>
            <div class="form-group">
                <label for="contrasena">Contrasena:</label>
                <input type="text" class="form-control" name="contrasena" id="contrasena">
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
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $usuario_obj->llenar_tabla();
            ?>
        </tbody>
        </table>
    </div>
</body>
<?php
    include('../footer.php');
?>