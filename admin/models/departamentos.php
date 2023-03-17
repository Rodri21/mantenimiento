<?php
require_once '../database.php';
class Departamentos{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla(){
        $table = '';
        $result = $this->db->query('SELECT * FROM departamento;');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_departamento"] . "</td>";
            $table .= "<td>" . $row["departamento"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }
}
?>