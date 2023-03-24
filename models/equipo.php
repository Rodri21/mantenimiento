<?php
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../database.php';
class Equipo{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla(){
        $table = '';
        $result = $this->db->query("SELECT e.id_equipo, e.serie, e.marca, d.departamento, CONCAT(p.nombre, ' ', p.apellido_pa, ' ', p.apellido_ma) AS propietario 
            FROM equipo e 
            JOIN departamento d ON e.id_departamento = d.id_departamento 
            JOIN propietario p ON e.id_propietario = p.id_propietario;");
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_equipo"] . "</td>";
            $table .= "<td>" . $row["serie"] . "</td>";
            $table .= "<td>" . $row["marca"] . "</td>";
            $table .= "<td>" . $row["departamento"] . "</td>";
            $table .= "<td>" . $row["propietario"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

    public function llenar_cbo(){
        $cbo='';
        $result = $this->db->query('SELECT * FROM equipo;');
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_equipo"] ."'>" . $row["serie"] . "</option>";
        }
        echo $cbo;
    }
}
?>