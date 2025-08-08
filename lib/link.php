<?php
  $host_name = 'localhost';
  $database = 'barberss_rafesp';
  $user_name = 'barberss_rafesp';
  $password = 'rafesp2022';

  $link = new mysqli($host_name, $user_name, $password, $database);

//   if ($link->connect_error) {
//     die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
//   } else {
//     echo '<p>Se ha establecido la conexi¨®n al servidor MySQL con ¨¦xito.</p>';
//   }
?>