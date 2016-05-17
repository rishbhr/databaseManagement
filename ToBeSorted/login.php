<html>
	<head>
		<title>DB.2.3.LOGIN</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="loginStyleSheet.css"/>
	</head>

	<body>
		<div id='input_form'>
		<form action="welcome.php" method="post">
			<fieldset>
				<legend>Login:</legend>
				<h3>Username:</h3> <input type="text" name="username"><br>
				<h3>Password:</h3> <input type="password" name="password"><br>
				<h3>Keywords:</h3> <input type="text" name="keywords"><br>
				<br>
				<input type="submit">
			</fieldset>
		</form>
	<footer>
		
	</footer>

		<?php
		 if(isset($_POST['submit'])) {
			//db connection
			include('mysqliConnect.php');

			//errors
			$errors = array();

			//user variables
			$username = $_POST['username'];
			$password = $_POST['password'];
			$keywords = urlencode($_POST['keywords']);
			$role = '';

			
			//ip variables
			$keanIp;

			/*error message array*/
			$errors[0] = "Please complete all fields.";
			$errors[2] = "Username " . $username . " does not exist in the database";

			if(!empty($username) || !empty($password) || empty($keywords)){
				$query = "select * from Users where login = '$username' ";
				$result = mysqli_query($db_handler, $query);

				if(mysql_num_rows($result) > 0){
					$row = mysqli_fetch_array($result);

					//store the information
					$firstName = $row['last_name'];
					$last_name = $row['first_name'];
					$role = $row['role'];
					$address = $row['address'] . " , " . $row['state'] . " " . $row['zipcode'];
					//set cookie
					setcookie('loginID', $row['id'], time() + 86400);
				} 
				if(empty($username) || empty($password) || empty($keywords)){
					echo $errors[0];
				}
			}
			else{
					/*If the user does not exist on the database*/
					echo $errors[2];
				}



			//IP Detector
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
			} else{ 
				$ip = $_SERVER['REMOTE_ADDR']; 
			}
			$IPv4= explode(" . ",$ip);

			//IP identifier
			if(($IPv4[0] == 10) or ($IPv4[0] . "." . $IPv4[1] == "131.125")){
				$keanIp = "<br>You are from Kean University<br>";
			} else{
				$keanIp = "<br>You are not from Kean University<br>";
			}

			//close connection
			mysqli_close($db_handler);
		
		 }
		?> 	
	</body>
</html>