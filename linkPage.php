<!DOCTYPE PHP>	
	<html>
		<header>
			<h2>Link Page<h2>
		</header>

		<body>
			<?php
				include(config.php);
				$username = $_POST['username'];
				$password = $_POST['password'];
				$keywords = str_replace(" ", "+", $_POST["keywords"]);

				error_reporting(E_ALL|E_STRICT);

				if(empty($username) || empty($password)){
					echo "Please enter username or password correctly \n";
					die;
				}
				
				/*Code from project 1
				if($username != "test" && $password != "3740"){
					echo "<br>Username or Password is not correct.\n";
					die;
				}
				*/

				//log-in
				$db_handler = mysql_connect($hostname, $username, $password);
				or die("<br>Cannot connect to Database");

				mysql_select_db(DB_DATABASE);

				//IP Getter

				if(!empty($_SERVER['HTTP_CLIENT_IP'])){
					$ip=$_SERVER['HTTP_CLIENT_IP'];
				}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
					$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
				}else{
					$ip=$_SERVER['REMOTE_ADDR'];
				}

				echo "<br>Your IP: $ip\n";
				$IPv4 = explode(".", $ip);

				if(($IPv4[0]==10) or ($IPv4[0] . "." . $IPv4[1]== "69.114")){
					echo "<br>You are from Kean, Hello.\n";
				}else{
					echo "<br>Your are not from Kean, hello guest.\n";
					die;
				}




			?>
		</body>
	</html>