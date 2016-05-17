<html>
	<head>
		<title>Welcome Page</title>
		<link rel="stylesheet" type="text/css" href="loginStyleSheet.css"/>
		<?php
			include('session.php');
		?>
	</head>
	<body>
		<h2>Welcome <?php echo $login_session; ?></h1>
		<h2><a href = "logout.php">Sign Out</a></h2>
	</body>

</html>
