<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['rol'])) {
        $query='';
        $select='';
        //ADMIN
        if ($_POST['rol']=='admin') {
            if (isset($_POST['usuario'])) {
                $hist = $_POST['usuario'];
                $select = "SELECT CONCAT(p.nombre, ' ', p.apellido_pa, ' ', p.apellido_ma) AS nombre_completo";
            }
            if (isset($_POST['correo'])) {
                $hist = $_POST['correo'];
                $select = "SELECT p.correo";
            }
            $query = $select." FROM propietario p JOIN equipo e  ON e.id_propietario = p.id_propietario
                    JOIN historial_mantenimiento hm  ON hm.id_equipo = e.id_equipo
                    WHERE hm.id_historial = $hist;";
        }

        //ENCARGADO
        if ($_POST['rol']=='encargado') {
            if (isset($_POST['usuario'])) {
                $equipo = $_POST['usuario'];
                $select = "SELECT CONCAT(p.nombre, ' ', p.apellido_pa, ' ', p.apellido_ma) AS nombre_completo";
            }
            if (isset($_POST['correo'])) {
                $equipo = $_POST['correo'];
                $select = "SELECT p.correo";
            }
            $query = $select. " FROM propietario p
                    JOIN equipo e  ON e.id_propietario = p.id_propietario
                    WHERE e.id_equipo = $equipo;";
        }
        $result = $db->query($query);
        $output = pg_fetch_result($result, 0, 0);
        echo $output;
    }

    if (isset($_POST['new_nombre'])) {
        $nombre = $_POST['new_nombre'];
        $apellido_pa = $_POST['new_apellido_pa'];
        $apellido_ma = $_POST['new_apellido_ma'];
        $correo = $_POST['new_correo'];

        $query = "INSERT INTO propietario (nombre, apellido_pa, apellido_ma, correo) VALUES('$nombre','$apellido_pa','$apellido_ma','$correo');";
        $result = $db->query($query);
        echo "
            <script>
                alert('Registro guardado');
            </script>
        ";
        header('Location: /mantenimiento/admin/propietarios.php');
    }
?>