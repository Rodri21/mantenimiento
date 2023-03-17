<?php
// Inicia la sesión
session_start();
//header('Location: inicio.php');
require_once('config.php');
require_once 'database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/*
$conn_string = pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD);
//$conn = pg_connect($conn_string);
if (!$conn_string) {
    echo "Error al conectar a la base de datos.";
    exit;
}
*/

$db = new Database();


$result = $db->query("SELECT * FROM usuario");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$user = $db->get_user($usuario, $contrasena);

if ($user) {
  if(esAdmin($db, $usuario, $contrasena)){
    header('Location: admin/inicio.php');
  } else{
    header('Location: inicio.php');
  }
} else {
  echo 'Usuario incorrecto';
}
$db->close();
  
function esAdmin($db, $usuario, $contrasena){
    $res = $db->query("SELECT esadmin FROM usuario where usuario='$usuario' AND contrasena='$contrasena'");
    $row = pg_fetch_assoc($res);
    $esAdmin = $row['esadmin'];
    var_dump($esAdmin);
    return $esAdmin=='t';
}

?>
