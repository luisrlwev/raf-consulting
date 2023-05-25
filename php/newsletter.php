<?php

$email = $_POST["email"];

$body = "";
$body .= "E-mail: ";
$body .= $email;
$body .= "<br>";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.rafconsulting.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'newsletter@rafconsulting.net';                     // SMTP username
    $mail->Password   = 'Rafconsulting-2021.';                               // SMTP password
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('newsletter@rafconsulting.net', $email);
    $mail->addAddress('newsletter@rafconsulting.net');     // Para Rafconsulting
    $mail->addCC('hola@luisweb.me');     // Para mi

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Rafconsulting - Newsletter';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo 'success'  ;
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
}