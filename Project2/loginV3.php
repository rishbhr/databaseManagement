<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="loginStyleSheet.css"/>
	</head>
	<body>
		<?php
			include("mysqliConnect.php");
			session_start();

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				//USERNAME AND PASSWORD ARE SENT FROM THE FORM

				$username = mysqli_real_escape_string($_POST['username']);
				$password = mysql_real_escape_string($_POST['password']);

				//MYSQL QUERY
				$sql = "SELECT id from Users where login = '$username' and password = '$password'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$active = $row['active'];

				$count = mysqli_num_rows($result);
				echo $count;
				echo $row;

				//IF THE USERNAME OR PASSWORD DOES MATCH DATABASE THERE MUST BE 1 ROW
				if($count > 0){
					session_register("username");
					$_SESSION['login_user'] = $username;

					//header("location: welcome.php");
				} else{
					$error = "There is an error in your ways, fix it before moving forward.";
				}
			}
		?>

		<form action = "welcome.php" method = "post">
			<label>Username: </label><input type = "text" name = "username"><br>
			<label>Password: </label><input type = "password" name = "password"><br>
			<input type = "submit" value = "Submit" />
		</form>

		<div>
			<?php
				$error
			?>
		</div>