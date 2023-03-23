<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['admin'])) {
        if ($_POST['admin']=='true') {
            $id_equipo = $_POST['equipo'];
            $fecha_esperada = $_POST['fecha-mtto'];
            $id_encargado = $_POST['encargado'];
            $tipo_mantenimiento = $_POST['tipo-mtto'];
            
            $query = "INSERT INTO historial_mantenimiento (id_equipo, fecha_esperada, id_usuario, tipo_mantenimiento)
            VALUES (".$id_equipo.", '".$fecha_esperada."', ".$id_encargado.", '".$tipo_mantenimiento."');";
            $db->query($query);
            header('Location: ../admin/inicio.php');
        } else {
            $fecha_real = $_POST['fecha-mtto'];
            $observaciones = $_POST['observaciones'];
            $herramientas = $_POST['herramientas'];
            $id_hist = $_POST['hist'];

            $query = "UPDATE historial_mantenimiento
            SET fecha_real = '".$fecha_real."', observaciones = '".$observaciones."', herramientas = '".$herramientas."'
            WHERE id_historial = $id_hist;";
            $db->query($query);
            header('Location: ../inicio.php');
        }
    } 
?>