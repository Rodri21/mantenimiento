<?php
    include_once('../errors.php');
    ob_end_clean();
    require('fpdf/fpdf.php');
    require_once('../database.php');

    // Crear una instancia de FPDF
    $pdf = new FPDF();

    // Agregar una página al PDF
    $pdf->AddPage();

    // Establecer el tamaño y la posición de la tabla
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'Tabla historial_mantenimiento');
    $pdf->Ln(10); // Salto de línea

    // Conectar a la base de datos
    $db = new Database();

    // Ejecutar la consulta para obtener los datos de la tabla
    $result = $db->query("SELECT * FROM historial_mantenimiento");

    // Encabezado de la tabla
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(8,10,'ID',1);
    $pdf->Cell(15,10,'ID Equipo',1);
    $pdf->Cell(30,10,'Fecha Esperada',1);
    $pdf->Cell(30,10,'Fecha Real',1);
    $pdf->Cell(50,10,'Observaciones',1);
    $pdf->Cell(30,10,'ID Usuario',1);
    $pdf->Cell(50,10,'Tipo de Mantenimiento',1);
    $pdf->Cell(50,10,'Herramientas',1);
    $pdf->Ln(); // Salto de línea

    // Datos de la tabla
    $pdf->SetFont('Arial','',10);
    while ($row = pg_fetch_assoc($result)) {
    $pdf->Cell(8,10,$row['id_historial'],1);
    $pdf->Cell(15,10,$row['id_equipo'],1);
    $pdf->Cell(30,10,$row['fecha_esperada'],1);
    $pdf->Cell(30,10,$row['fecha_real'],1);
    $pdf->Cell(50,10,$row['observaciones'],1);
    $pdf->Cell(30,10,$row['id_usuario'],1);
    $pdf->Cell(50,10,$row['tipo_mantenimiento'],1);
    $pdf->Cell(50,10,$row['herramientas'],1);
    $pdf->Ln(); // Salto de línea
    }

    // Salida del PDF
    $pdf->Output();

?>


<body>
    <h1>Titulo</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus similique eligendi et consequuntur. Commodi, quae.</p>
    <hr>
    <h2>Titulo 2</h2>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente repellendus ab similique dolor mollitia 
        assumenda debitis in saepe deleniti velit inventore voluptate repellat illum, quas aliquam doloribus ipsum 
        quam optio at! Impedit possimus laudantium aut, perspiciatis laborum tenetur quidem est.
    </p>
</body>