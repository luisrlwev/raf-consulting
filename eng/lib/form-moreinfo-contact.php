<?php
// error_reporting(E_ERROR | E_PARSE);
header('Access-Control-Allow-Origin: https://rafconsulting.net'); 
$nombrefc = $_POST['fname'];
$emailfc = $_POST['email'];
$empresafc = $_POST['empresa'];
$puestofc = $_POST['puesto'];
$paisfc = $_POST['pais'];
$infofc = $_POST['informacion'];
$telfc = $_POST['telfijo'];
$celfc = $_POST['telcel'];
$mensajefc = $_POST['msg'];
$respCaptcha = $_POST['g-recaptcha-response'];
/* VERIFICAMOS SI EL USUARIO ACEPTO LOS TERMINOS Y CONDICIONES ASI COMO EL AVISO DE PRIVACIDAD */    
if(!empty($nombrefc) && !empty($emailfc) && !empty($empresafc) && !empty($paisfc) && !empty($infofc)){
        // $to  = $_POST['email'];
        // $to = 'contacto@rafconsulting.net, '.$emailfc;
        $to = $emailfc;
        
        // subject
        $subject = 'Contacto RAF Consulting';
        // message
        $message = '
        <html>
        <head>
        <meta charset="utf-8">
        <title>Contact RAF Consulting</title>
        </head>
        <body>
        <img src="https://rafconsulting.net/img/headermail.jpg" style="max-width:1024px; margin:0 auto;">
        <p>
        We have received your message with the following information:
        <br><br>
        <strong>Name:</strong> '.$nombrefc.'<br><br>
        <strong>Company:</strong> '.$empresafc.'<br><br>
        <strong>Email:</strong> '.$emailfc.'<br><br>
        <strong>Position:</strong> '.$puestofc.'<br><br>
        <strong>Company’s country of origin:</strong> '.$paisfc.'<br><br>
        <strong>Information about:</strong> '.$infofc.'<br><br>
        <strong>Phone number:</strong> '.$telfc.'<br><br>
        <strong>Cell phone:</strong> '.$celfc.'<br><br>        
        <strong>Message:</strong> '.$mensajefc.'<br><br>
        We will contact you.<br>
        RAF Consulting<br>
        (55) 56992444<br><br>
        Contact us
        +52 55 5683-5496 | +52 55 5920-6339<br>
        <a href="https://rafconsulting.net" target="_blank">www.rafconsulting.net</a>
        </p>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        // Additional headers
        $headers .= 'From: Contact RAF Consulting <contacto@rafconsulting.net>' . "\r\n";

        $success = mail($to, $subject, $message, $headers);
        if (!$success) {
            echo "0";
        }else{
        echo "1";
        }
}
else{
    echo "0";
}
?>