
<?php
require_once __DIR__ . '/../errors.php';
require_once('../models/historial_mantenimiento.php');
$hist_obj = new HistorialMantenimiento();

require_once __DIR__ . '/../vendor/autoload.php'; // ruta a la librería mpdf

$mpdf = new \Mpdf\Mpdf();
$html = '
<html>
    <head>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <div class="container">
        <h1 class="text-center"> Historial de mantenimiento</h1>
        <hr>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Departamento</th>
                <th>Serie</th>
                <th>Encargado</th>
                <th>Propietario</th>
                <th>Fecha esperada</th>
                <th>Fecha real</th>
                <th>Observaciones</th>
                <th>Tipo</th>
                <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                '. $hist_obj->llenar_pdf() .'
            </tbody>
        </table>
    </div>
</html>

'; // aquí puedes poner tu HTML

//echo $html;
$mpdf->WriteHTML($html);$mpdf->Output();


?>

