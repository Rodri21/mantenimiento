<?php
    require_once('../errors.php');
    require_once('../database.php');

    $db = new Database();

    if (isset($_POST['new_nombre'])) {
        $nombre = $_POST['new_nombre'];
        $usuario = $_POST['new_usuario'];
        $contrasena = $_POST['new_contrasena'];
        $correo = $_POST['new_correo'];

        $query = "INSERT INTO usuario (nombre, usuario, contrasena, correo, esAdmin) VALUES('$nombre','$usuario','$contrasena','$correo', false);";
        $result = $db->query($query);
        echo "
            <script>
                alert('Registro guardado');
            </script>
        ";
        header('Location: /mantenimiento/admin/usuarios.php');
    }
?>