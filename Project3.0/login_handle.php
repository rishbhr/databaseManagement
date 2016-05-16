		<?php
			require("mysqliConnect.php");

			//USERNAME AND PASSWORD ARE SENT FROM THE FORM
			if(isset($_POST["username"])&&isset($_POST["password"])&&isset($_POST["keywords"])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				$keywords = $_POST["keywords"];
				$keywords = urlencode($keywords);
				setcookie('keywords', $keywords, time() + 86400);

				//MYSQL QUERY
				$query = "select * from Users where login = '$username' and password = '$password'";
				$result = mysqli_query($dbc, $query);
				$rows = mysqli_num_rows($result);
				$details = mysqli_fetch_array($result);
				$error = "There is an error in your ways, fix it before moving forward.";
				}

				//if theres a record
				if (!isset($username) && !isset($password) && !isset($keywords)) {
					include('project3.html');
					echo $error;
				} elseif($rows > 0 || $rows == 1) {
					//fetch records
					$row = mysqli_fetch_array($result);
					setcookie('userDetails', serialize($details), time() + 86400);
					
					echo"<script>window.location.replace('welcome.php')</script>";
					die;

				} else {
					include('project3.html');
					echo $error;
					die;
				}

				//ip address detection
				if(isset($_SERVER['HTTP_CLIENT_IP'])){
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$ip = $_SERVER['REMOTE_ADDR'];
				}
				echo $ip;
				setcookie('ip', $ip, time() + 86400);
				$IPv4 = explode(".", $ip);

				//kean location ip
				if(($IPv4[0] == 10) or ($IPv4[0] . "." . $IPv4[1] == "131.125")){
					$fromKean = "You're from Kean University<br>";
				} else{
					$fromKean = "<br>You're not from Kean University<br>";
				}
				
				setcookie('ipDeets', $fromKean, time() + 86400);

					/*DEBUGGER CODE
					echo"<script>window.location.replace('welcome.php')</script>";
					$variable = unserialzie($_cookie[''])
					echo"<script>window.location.replace('welcome.php')</script>";
					if(!empty(mysqli_error($dbc))){
					$error = mysqli_error($dbc);}
					set cookie
					setcookie('fname', $row['last_name'], time() + 444444);
					setcookie('lname', $row['first_name'], time() + 444444);
					setcookie('userID', $row['id'], time() + 86400); //one day
					setcookie('role', $row['role'], time() + 86400);
					setcookie('address', $row['address'], time() + 86400);
					setcookie('zipcode', $row['zipcode'], time() + 86400);
					setcookie('state', $row['state'], time() + 86400);
					cookie array
					$userdeets = array();
					$userdeets['fname'] = $row["first_name"];
					$userdeets[] = $row['last_name'];
					$userdeets[] = $row['id'];
					$userdeets[] = $row['role'];
					$userdeets[] = $row['address'];
					$userdeets[] = $row['zipcode'];
					$userdeets[] = $row['state'];*/

		?>

