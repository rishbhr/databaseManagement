<html>
	<head>
		<title>Logout Page</title>
	</head>
	<body>
		<?php
		session_start();
   
   		if(session_destroy()) {
      		//header("Location: loginV3.php");
   		}
		?>
	</body>
</html>