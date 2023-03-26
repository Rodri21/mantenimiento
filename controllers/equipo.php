<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['equipo'])) {
        $hist = $_POST['equipo'];
        $query = "SELECT e.serie FROM historial_mantenimiento hm
        JOIN equipo e ON hm.id_equipo = e.id_equipo
        WHERE hm.id_historial = $hist;";
        $result = $db->query($query);
        $equipo = pg_fetch_result($result, 0, 0);
        echo $equipo;
    }

    if (isset($_POST['new_serie'])) {
        $serie = $_POST['new_serie'];
        $marca = $_POST['new_marca'];
        $departamento = $_POST['new_departamento'];
        $usuario = $_POST['new_usuario'];

        $query = "INSERT INTO equipo (serie, marca, id_departamento, id_propietario) VALUES('$serie','$marca',$departamento,$usuario);";
        $result = $db->query($query);
        echo "
            <script>
                alert('Registro guardado');
            </script>
        ";
        header('Location: /mantenimiento/admin/equipos.php');
    }
?>