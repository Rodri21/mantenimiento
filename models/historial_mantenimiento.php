<?php
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../database.php';
class HistorialMantenimiento{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla(){
        $table = '';
        $result = $this->db->query('SELECT * FROM historial_mantenimiento;');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_historial"] . "</td>";
            $table .= "<td>" . $row["id_equipo"] . "</td>";
            $table .= "<td>" . $row["fecha_esperada"] . "</td>";
            $table .= "<td>" . $row["fecha_real"] . "</td>";
            $table .= "<td>" . $row["observaciones"] . "</td>";
            $table .= "<td>" . $row["id_usuario"] . "</td>";
            $table .= "<td>" . $row["tipo_mantenimiento"] . "</td>";
            $table .= "<td>" . $row["herramientas"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

}
?>