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
        <title>Contacto RAF Consulting</title>
        </head>
        <body>
        <img src="https://rafconsulting.net/img/headermail.jpg" style="max-width:1024px; margin:0 auto;">
        <p>
        Hemos recibido su mensaje con los siguientes datos:
        <br><br>
        <strong>Nombre:</strong> '.$nombrefc.'<br><br>
        <strong>Empresa:</strong> '.$empresafc.'<br><br>
        <strong>Email:</strong> '.$emailfc.'<br><br>
        <strong>Puesto:</strong> '.$puestofc.'<br><br>
        <strong>Pa&iacute;s:</strong> '.$paisfc.'<br><br>
        <strong>Desea informaci&oacute;n de:</strong> '.$infofc.'<br><br>
        <strong>Tel&eacute;fono:</strong> '.$telfc.'<br><br>
        <strong>Celular:</strong> '.$celfc.'<br><br>        
        <strong>Mensaje:</strong> '.$mensajefc.'<br><br>
        En breve lo contactaremos.<br>
        RAF Consulting<br>
        (55) 56992444<br><br>
        Cont&aacute;ctanos
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
        $headers .= 'From: Contacto RAF Consulting <contacto@rafconsulting.net>' . "\r\n";

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