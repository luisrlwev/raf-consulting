<?php

//Taking all values
$fname 		= $_POST['fname'];
$email 		= $_POST['email'];
$msg 		= $_POST['msg'];
$output 	= "Name: ".$fname."\n\nMessage: ".$msg;

$to 		= 'saikatahmed420@gmail.com';
$headers	= 'FROM: "'.$email.'"';

$send		= mail($to, $fname, $output."\n\n***This message has been sent from Consult Vita", $headers);
