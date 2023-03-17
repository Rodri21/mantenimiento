<?php
require_once('config.php');
class Database{

  private $conn;

  public function __construct(){
    $this->connect();
  }

  private function connect() {
    $conn_string = pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD);
    $this->conn = $conn_string;
    if (!$this->conn) {
      echo "Error al conectar a la base de datos.";
      exit;
    }
  }

  public function query($query) {
    return pg_query($this->conn, $query);
  }

  public function close() {
    pg_close($this->conn);
  }

  public function get_user($usuario, $contrasena) {
    $query = "SELECT * FROM usuario WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $result = $this->query($query);
    return pg_fetch_assoc($result);
  }
  
  /*
  $result = pg_query($conn, "SELECT * FROM personal_mant");
  while ($row = pg_fetch_assoc($result)) {
    echo "ID: " . $row["id_personal"] . "<br>";
    echo "Nombre: " . $row["nombre"] . "<br>";
    echo "Usuario: " . $row["usuario"] . "<br>";
    echo "Correo: " . $row["correo"] . "<br><br>";
  }
  */
}
?>
