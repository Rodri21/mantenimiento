
<?php
require_once __DIR__ . '/../errors.php';
require_once('../models/historial_mantenimiento.php');
$hist_obj = new HistorialMantenimiento();

require_once __DIR__ . '/../vendor/autoload.php'; // ruta a la librería mpdf

$mpdf = new \Mpdf\Mpdf();
$var = '<h1> HOLA </h1>';
$html = '

<h1> HOLA </h1>
<div class="container">
    <br>
    <h1 class="text-center">Historial de mantenimiento</h1>
    <hr>
    <table   class="table table-bordered table-striped text-center" >
    <thead>
        <tr>
        <th scope="col" class="col-md-1 table-secondary">ID</th>
        <th scope="col" class="col-md-1 table-secondary">Departamento</th>
        <th scope="col" class="col-md-1 table-secondary">Encargado</th>
        <th scope="col" class="col-md-1 table-secondary">Propietario</th>
        <th scope="col" class="col-md-2 table-secondary">Serie</th>
        <th scope="col" class="col-md-1 table-secondary">Fecha esperada</th>
        <th scope="col" class="col-md-1 table-secondary">Fecha real</th>
        <th scope="col" class="col-md-2 table-secondary">Observaciones</th>
        <th scope="col" class="col-md-1 table-secondary">Tipo</th>
        <th scope="col" class="col-md-1 table-secondary">Herramientas</th>
        </tr>
    </thead>
    <tbody>'.
            $hist_obj->llenar_pdf()
        .'
    </tbody>
    </table>
</div>
'; // aquí puedes poner tu HTML
$mpdf->WriteHTML($html);
$mpdf->Output();


?>



