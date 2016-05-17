		<?php
			require("mysqliConnect.php");

				//USERNAME AND PASSWORD ARE SENT FROM THE FORM
				$username = $_POST["username"];
				$password = $_POST["password"];
				$keywords = urlencode($_POST['keywords']);

				//MYSQL QUERY
				$query = "select * from Users where login = '$username' and password = '$password'";
				$result = mysqli_query($dbc, $query);
				$rows = mysqli_num_rows($result);
				$error = "There is an error in your ways, fix it before moving forward.";
				//if theres a record
				if (empty($username) || empty($password) || empty($keywords)) {
					include('index.html');
					echo $error;
				}elseif($rows > 0 || $count == 1){
					//fetch records
					$row = mysqli_fetch_array($result);
					//set cookie
					setcookie('name', $row['last_name'], time() + 444444);
					setcookie('userID', $row['id'], time() + 86400); //one day
					include('welcome.php');
					die;

				} elseif($rows == 0 || $count < 1){
					include('project2.html');
					echo $error;
					die;
				}
		?>