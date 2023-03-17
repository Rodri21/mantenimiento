<?php
include('header.php');
?>
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
