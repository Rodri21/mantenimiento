<?php
require_once('../errors.php');
require_once('../database.php');
$db = new Database();
if (isset($_POST)) {
    if ($_POST['admin']=='true') {
        $id_equipo = $_POST['equipo'];
        $fecha_esperada = $_POST['fecha-mtto'];
        $id_encargado = $_POST['encargado'];
        $tipo_mantenimiento = $_POST['tipo-mtto'];
        
        $query = "INSERT INTO historial_mantenimiento (id_equipo, fecha_esperada, id_usuario, tipo_mantenimiento)
        VALUES (".$id_equipo.", '".$fecha_esperada."', ".$id_encargado.", '".$tipo_mantenimiento."');";
        $db->query($query);
    } else {
        $fecha_real = $_POST['fecha-mtto'];
        $observaciones = $_POST['observaciones'];
        $herramientas = $_POST['herramientas'];

        $query = "UPDATE historial_mantenimiento
        SET fecha_real = '".$fecha_real."', observaciones = '".$observaciones."', herramientas = '".$herramientas."'
        WHERE id_historial = 123;";
        $db->query($query);
    }
} 
?>