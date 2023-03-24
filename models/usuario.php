<?php
require_once __DIR__ . '/../errors.php';
require_once __DIR__ . '/../database.php';
class Usuario{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function llenar_tabla(){
        $table = '';
        $result = $this->db->query("SELECT id_usuario, nombre, usuario, contrasena, correo, 
            CASE WHEN esAdmin = 't' THEN 'Admin' ELSE 'Personal' END AS rol 
            FROM usuario;");
        while ($row = pg_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= "<td>" . $row["id_usuario"] . "</td>";
            $table .= "<td>" . $row["nombre"] . "</td>";
            $table .= "<td>" . $row["usuario"] . "</td>";
            $table .= "<td>" . $row["contrasena"] . "</td>";
            $table .= "<td>" . $row["correo"] . "</td>";
            $table .= "<td>" . $row["rol"] . "</td>";
            $table .= '</tr>';
        }
        echo $table;
    }

    public function llenar_cbo(){
        $cbo='';
        $result = $this->db->query('SELECT * FROM usuario WHERE esAdmin = false;');
        while($row = pg_fetch_assoc($result)){
            $cbo .= "<option value='". $row["id_usuario"] ."'>" . $row["nombre"]. ' ' . "</option>";
        }
        echo $cbo;
    }

    public function mostrarNombre($id_usuario){
        $res = $this->db->query("SELECT nombre FROM usuario WHERE id_usuario = $id_usuario;");
        $row = pg_fetch_assoc($res);
        echo $row['nombre'];
    }
}
?>