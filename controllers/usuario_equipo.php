<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['usuario'])) {
        $hist = $_POST['usuario'];
        $query = "SELECT CONCAT(ue.nombre, ' ', ue.apellido_pa, ' ', ue.apellido_ma) AS nombre_completo
            FROM historial_mantenimiento hm 
            JOIN equipo e ON hm.id_equipo = e.id_equipo 
            JOIN usuario_equipo ue ON hm.id_usuario = ue.id_usuario 
            WHERE hm.id_historial = $hist;";
        $result = $db->query($query);
        $usuario = pg_fetch_result($result, 0, 0);
        echo $usuario;
    } 

    if (isset($_POST['correo'])) {
        $hist = $_POST['correo'];
        $query = "SELECT ue.correo
            FROM historial_mantenimiento hm 
            JOIN equipo e ON hm.id_equipo = e.id_equipo 
            JOIN usuario_equipo ue ON hm.id_usuario = ue.id_usuario 
            WHERE hm.id_historial = $hist;";
        $result = $db->query($query);
        $usuario = pg_fetch_result($result, 0, 0);
        echo $usuario;
    }
?>