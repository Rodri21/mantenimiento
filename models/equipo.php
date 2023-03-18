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
        $result = $this->db->query('SELECT * FROM equipo;');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_equipo"] . "</td>";
            $table .= "<td>" . $row["equipo"] . "</td>";
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