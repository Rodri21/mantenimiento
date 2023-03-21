<?php
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../database.php';
class UsuarioEquipo{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla(){
        $table = '';
        $result = $this->db->query('SELECT * FROM usuario_equipo;');
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_usuario"] . "</td>";
            $table .= "<td>" . $row["nombre"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

    public function llenar_cbo_usuario(){
        $cbo='';
        $result = $this->db->query('SELECT * FROM usuario_equipo;');
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_usuario"] ."'>" . $row["nombre"]. ' ' . "</option>";
        }
        echo $cbo;
    }
 
    public function llenar_cbo_email(){
        $cbo='';
        $result = $this->db->query('SELECT * FROM usuario_equipo;');
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_usuario"] ."'>" . $row["correo"]. ' ' . "</option>";
        }
        echo $cbo;
    }
}
?>