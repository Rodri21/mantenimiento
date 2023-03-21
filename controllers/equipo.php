<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['equipo'])) {
        $hist = $_POST['equipo'];
        $query = "SELECT e.serie FROM historial_mantenimiento hm
        JOIN equipo e ON hm.id_equipo = e.id_equipo
        WHERE hm.id_historial = $hist;
        ";
        $result = $db->query($query);
        $equipo = pg_fetch_result($result, 0, 0);
        echo $equipo;
    }
?>