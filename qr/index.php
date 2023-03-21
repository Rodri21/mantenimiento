<?php
	session_start();
    if (!empty($_SESSION['admin'])) {
		$admin = $_SESSION['admin'];
		if ($admin=='false') {
			echo $_POST['admin'];
			include('../header.php');
        } else if ($admin=='true') {
			echo $_POST['admin'];
			include('../admin/header.php');
		}
	} else {
		header('Location: ../index.php');
		exit();
	}
	$admin = $_SESSION['admin'];
	
	require 'phpqrcode/qrlib.php';
	
	$dir = 'temp/';
	
	if(!file_exists($dir))
		mkdir($dir);
	
	$filename = $dir.'test.png';
	
	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
	$contenido = '../reports/sample.pdf';

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

	
?>

<div id="myElement" data-admin="<?php echo $admin; ?>"></div>
<body><br>
	<div class="container" style="text-align:center;">
		<h1>Reporte general de mantenimiento</h1>
		<hr>
		<img src="<?php echo $filename; ?>" />
	</div>
</body>
<?php
include('../footer.php');
?>
