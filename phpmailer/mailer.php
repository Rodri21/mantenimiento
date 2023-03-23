
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$to = 'testmailtecno';
$subject = "Email Subject";

$message = 'Dear Rodrigo ,<br>';
$message .= "We welcome you to be part of family<br><br>";
$message .= "Regards,<br>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <testmailtecno@gmail.com>' . "\r\n";
$headers .= 'Cc: testmailtecno@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>