<?php
require_once __DIR__ . '/../errors.php';
session_start();
require_once('../config.php');
require_once '../database.php';

$db = new Database();

$result = $db->query("SELECT * FROM usuario");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$user = $db->get_user($usuario, $contrasena);

if ($user) {
  if(esAdmin($db, $usuario, $contrasena)){
    $_SESSION['admin'] = 'true';
    header('Location: ../admin/inicio.php');
  } else{
    $_SESSION['admin'] = 'false';
    $_SESSION['id_usuario'] = getId($db, $usuario);
    header('Location: ../inicio.php');
  }
} else {
  echo 'Usuario incorrecto';
}
$db->close();
  
function esAdmin($db, $usuario, $contrasena){
    $res = $db->query("SELECT esadmin FROM usuario where usuario='$usuario' AND contrasena='$contrasena'");
    $row = pg_fetch_assoc($res);
    $esAdmin = $row['esadmin'];
    return $esAdmin=='t';
}

function getId($db, $usuario){
  $res = $db->query("SELECT u.id_usuario FROM usuario u WHERE u.usuario = '$usuario';");
  $row = pg_fetch_assoc($res);
  $id_usuario = $row['id_usuario'];
  var_dump($id_usuario);
  return $id_usuario;
}

?>
