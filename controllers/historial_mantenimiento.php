<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require_once('../errors.php');
    require_once('../database.php');

    require '../phpmailer/phpmailer/src/Exception.php';
    require '../phpmailer/phpmailer/src/PHPMailer.php';
    require '../phpmailer/phpmailer/src/SMTP.php';
    
    $db = new Database();

    if (isset($_POST['admin'])) {
        if ($_POST['admin']=='true') {
            $id_equipo = $_POST['equipo'];
            $fecha_esperada = $_POST['fecha-mtto'];
            $id_encargado = $_POST['encargado'];
            $tipo_mantenimiento = $_POST['tipo-mtto'];
            
            $query = "INSERT INTO historial_mantenimiento (id_equipo, fecha_esperada, id_usuario, tipo_mantenimiento)
            VALUES (".$id_equipo.", '".$fecha_esperada."', ".$id_encargado.", '".$tipo_mantenimiento."');";
            $db->query($query);
            sendMail($_POST['correo'], $_POST['usuario'], $_POST['fecha-mtto']);
            header('Location: ../admin/inicio.php');
        } else {
            $fecha_real = $_POST['fecha-mtto'];
            $observaciones = $_POST['observaciones'];
            $herramientas = $_POST['herramientas'];
            $id_hist = $_POST['hist'];

            $query = "UPDATE historial_mantenimiento
            SET fecha_real = '".$fecha_real."', observaciones = '".$observaciones."', herramientas = '".$herramientas."'
            WHERE id_historial = $id_hist;";
            $db->query($query);
            header('Location: ../inicio.php');
        }
    } 

    function sendMail($address, $usuario, $fecha){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'testmailtecno@gmail.com';
        $mail->Password = 'qnyagspyevuubfaz';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
        
        $mail->setFrom('testmailtecno@gmail.com');
        $mail->addAddress($address);
        $mail->isHTML(true);
        $mail->Subject = "Mantenimiento programado";
        $mail->Body = "Querido/a $usuario, se le informa que el dia $fecha se realizara mantenimiento a su equipo.";
  
        $mail->send();
    }
?>

