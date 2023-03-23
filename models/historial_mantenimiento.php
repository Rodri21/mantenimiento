<?php
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../database.php';
class HistorialMantenimiento{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla_admin(){
        $table = '';
        $result = $this->db->query('
            SELECT hm.id_historial, e.serie, hm.fecha_esperada, hm.fecha_real, hm.observaciones, u.nombre, hm.tipo_mantenimiento, hm.herramientas
            FROM historial_mantenimiento hm
            INNER JOIN equipo e ON hm.id_equipo = e.id_equipo
            INNER JOIN usuario u ON hm.id_usuario = u.id_usuario
            ORDER BY hm.id_historial;
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

    public function llenar_tabla($id_usuario){
        $table = '';
        $result = $this->db->query('
            SELECT hm.id_historial, e.serie, hm.fecha_esperada, hm.fecha_real, hm.observaciones, u.nombre, hm.tipo_mantenimiento, hm.herramientas
            FROM historial_mantenimiento hm
            INNER JOIN equipo e ON hm.id_equipo = e.id_equipo
            INNER JOIN usuario u ON hm.id_usuario = u.id_usuario
            WHERE u.id_usuario = '.$id_usuario.' 
            ORDER BY hm.id_historial;
        ');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_historial"] . "</td>";
            $table .= "<td>" . $row["serie"] . "</td>";
            $table .= "<td>" . $row["fecha_esperada"] . "</td>";
            $table .= "<td>" . $row["fecha_real"] . "</td>";
            $table .= "<td>" . $row["observaciones"] . "</td>";
            $table .= "<td>" . $row["tipo_mantenimiento"] . "</td>";
            $table .= "<td>" . $row["herramientas"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

    public function llenar_pdf(){
        $table = '';
        $result = $this->db->query('
            SELECT hm.id_historial, d.departamento, u.usuario as propietario, ue.nombre as encargado, e.serie, hm.fecha_esperada, hm.fecha_real, hm.observaciones, hm.tipo_mantenimiento, hm.herramientas
            FROM historial_mantenimiento hm
            INNER JOIN equipo e ON hm.id_equipo = e.id_equipo
            INNER JOIN departamento d ON e.id_departamento = d.id_departamento
            INNER JOIN usuario u ON hm.id_usuario = u.id_usuario
            INNER JOIN usuario_equipo ue ON e.id_usuario = ue.id_usuario
            ORDER BY hm.id_historial;
        ');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_historial"] . "</td>";
            $table .= "<td>" . $row["departamento"] . "</td>";
            $table .= "<td>" . $row["encargado"] . "</td>";
            $table .= "<td>" . $row["propietario"] . "</td>";
            $table .= "<td>" . $row["serie"] . "</td>";
            $table .= "<td>" . $row["fecha_esperada"] . "</td>";
            $table .= "<td>" . $row["fecha_real"] . "</td>";
            $table .= "<td>" . $row["observaciones"] . "</td>";
            $table .= "<td>" . $row["tipo_mantenimiento"] . "</td>";
            $table .= "<td>" . $row["herramientas"] . "</td>";
            $table .= '</tr>';
        }
        return $table;
    }

    public function llenar_cbo($id_usuario){
        $cbo='';
        $result = $this->db->query("SELECT * FROM historial_mantenimiento WHERE id_usuario = $id_usuario ORDER BY id_historial;");
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_historial"] ."'>" . $row["id_historial"]. ' ' . "</option>";
        }
        echo $cbo;
    }
}
?>