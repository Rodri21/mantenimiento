<?php
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../database.php';
class Propietario{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla(){
        $table = '';
        $result = $this->db->query('SELECT * FROM propietario;');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_propietario"] . "</td>";
            $table .= "<td>" . $row["nombre"] . "</td>";
            $table .= "<td>" . $row["apellido_pa"] . "</td>";
            $table .= "<td>" . $row["apellido_ma"] . "</td>";
            $table .= "<td>" . $row["correo"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

    public function llenar_cbo_usuario(){
        $cbo='';
        $result = $this->db->query("SELECT id_propietario, CONCAT(nombre, ' ', apellido_pa, ' ', apellido_ma) AS nombre_completo FROM propietario;");
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_propietario"] ."'>" . $row["nombre_completo"]. ' ' . "</option>";
        }
        echo $cbo;
    }
 
    public function llenar_cbo_email(){
        $cbo='';
        $result = $this->db->query('SELECT * FROM propietario;');
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_propietario"] ."'>" . $row["correo"]. ' ' . "</option>";
        }
        echo $cbo;
    }
}
?>