<?php

DEFINE ('DB_USER', 'ranaris');
DEFINE ('DB_PASSWORD', '0843564');
DEFINE ('DB_HOST', 'imc.kean.edu');
DEFINE ('DB_NAME', 'CPS3740_2016S');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');

?>