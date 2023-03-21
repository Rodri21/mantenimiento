<?php
use Com\Tecnick\Pdf\Tcpdf;
    require_once __DIR__ . '/../errors.php';

    require_once('tcpdf/src/tcpdf.php');
    
    // Crea un objeto TCPDF
    $pdf = new Tcpdf();
    
    // Establece el formato del papel y la orientación
    $pdf->setPaper('A4', 'portrait');
    
    // Lee el contenido del archivo HTML
    $html = file_get_contents('archivo.html');
    
    // Agrega el contenido HTML al PDF
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // Genera el archivo PDF y envíalo al navegador
    $pdf->Output('archivo.pdf', 'I');

    
?>
