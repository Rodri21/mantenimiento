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
        $result = $this->db->query('
            SELECT hm.id_historial, e.serie, hm.fecha_esperada, hm.fecha_real, hm.observaciones, u.nombre, hm.tipo_mantenimiento, hm.herramientas
            FROM historial_mantenimiento hm
            INNER JOIN equipo e ON hm.id_equipo = e.id_equipo
            INNER JOIN usuario u ON hm.id_usuario = u.id_usuario;
        ');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_historial"] . "</td>";
            $table .= "<td>" . $row["serie"] . "</td>";
            $table .= "<td>" . $row["fecha_esperada"] . "</td>";
            $table .= "<td>" . $row["fecha_real"] . "</td>";
            $table .= "<td>" . $row["observaciones"] . "</td>";
            $table .= "<td>" . $row["nombre"] . "</td>";
            $table .= "<td>" . $row["tipo_mantenimiento"] . "</td>";
            $table .= "<td>" . $row["herramientas"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

    public function llenar_cbo(){
        $cbo='';
        $result = $this->db->query('SELECT * FROM historial_mantenimiento;');
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_historial"] ."'>" . $row["id_historial"]. ' ' . "</option>";
        }
        echo $cbo;
    }
}
?>