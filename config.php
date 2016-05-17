<?php
   define('DB_SERVER', 'imc.eve.kean.edu');
   define('DB_USERNAME', 'ranaris');
   define('DB_PASSWORD', '0843564');
   define('DB_DATABASE', 'CPS3740_2016S.Users');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Could not connect to the server: '.mysqli_connect_error() );
   
?>