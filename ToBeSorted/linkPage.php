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
				
				//Code from project 1
				if($username != "test" && $password != "3740"){
					echo "<br>Username or Password is not correct.\n";
					die;
				}

			?>
		</body>
	</html>