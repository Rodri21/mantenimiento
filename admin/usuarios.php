<?php
include('header.php');
?>
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
