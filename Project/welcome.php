<html>
	<head>
		<title>Welcome Page</title>
		<link rel="stylesheet" type="text/css" href="loginStyleSheet.css"/>
	</head>
	<body>
		<h2>Welcome</h1>
		<?php 
			echo $_COOKIE['name'];
			 
		?>
		<h2><a href = "logout.php">Sign Out</a></h2>
	</body>

</html>
