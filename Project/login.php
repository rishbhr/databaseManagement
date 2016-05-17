<html>
	<head>
		<title>Login</title>
	</head>

	<body>
		<form action="welcome.php" method="post">
			<fieldset>
				<legend>Login:</legend>
				<h3>Username:</h3> <input type="text" name="username"><br>
				<h3>Password:</h3> <input type="password" name="password"><br>
				<h3>Keywords:</h3> <input type="text" name="keywords"><br><br>
				<input type="submit">
			</fieldset>
		</form>
	</body>

	<?php
			if(isset($_COOKIE["username"]) || ($_COOKIE["username"]>0)){
				$username = $_COOKIE["username"];
			}
			//database connection
			require"mysqliConnect.php";

			//pass the variables from the login page
			$keywords = str_replace(" ", "+", $_POST["keywords"]);
			$username = $_POST['username'];
			$password = $_POST['password'];

			//kill the page if any of the following fields are empty
			if(empty($username)){
				echo "Must enter username \n";
				die;
			}

			if(empty($password)){
				echo "Must enter password \n";
				die;
			}

			if(empty($keywords)){
				echo "Must enter keywords \n";
				die;
			}

			//check users ip
			if(!empty($_SERVER['HTTP_CLIENT_IP']))


















			//result
			$result = mysql_query($query)

			//
			if($result){
				if(mysql_num_rows($result))
			}




	?>
