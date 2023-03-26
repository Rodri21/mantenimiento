<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['departamento'])) {
        $hist = $_POST['departamento'];
        $query = "SELECT d.departamento
            FROM departamento d
            INNER JOIN equipo e ON d.id_departamento = e.id_departamento
            INNER JOIN historial_mantenimiento hm ON e.id_equipo = hm.id_equipo
            WHERE hm.id_historial = $hist;";
        $result = $db->query($query);
        $departamento = pg_fetch_result($result, 0, 0);
        echo $departamento;
    }

    if (isset($_POST['new_departamento'])) {
        $departamento = $_POST['new_departamento'];
        $query = "INSERT INTO departamento(departamento) VALUES ('$departamento');";
        $result = $db->query($query);
        echo "
            <script>
                alert('Registro guardado');
            </script>
        ";
        header('Location: /mantenimiento/admin/departamentos.php');
    }
?>