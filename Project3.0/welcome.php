<?php
if(!isset($_COOKIE['userDetails'])||empty($_COOKIE['userDetails'])){
	header('Location: login_handle.php');
}
?>
<html>
	<head>
		<title>Welcome Page</title>
		<link rel="stylesheet" type="text/css" href="loginStyleSheet.css"/>
	</head>
	<body>
		<fieldset>
		<div>
		<?php
			$ipDeets = $_COOKIE['ipDeets'];
			$ip = $_COOKIE['ip'];

			$details = unserialize($_COOKIE['userDetails']);
			$keywords = $_COOKIE['keywords'];
			
			$link_address = "http://www.amazon.com/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords=$keywords";

			// update which ip address the request is coming from
			if(isset($_SERVER['HTTP_CLIENT_IP'])){
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}

			//string print formatted name
			echo sprintf("%s %s<br/>",$details['last_name'],$details['first_name']);

			//print the role
			echo sprintf("%s<br/>",$details['role']);

			//print the address
			echo sprintf("%s %s %s<br/>",$details['address'],$details['state'],$details['zipcode']);

			//the link to print amazon link
			echo sprintf("<a href='%s'>Link</a><br>",$link_address);
			echo sprintf("Your IP address is: %s<br/>%s<br/>",$ip,$ipDeets);



			/* Debugger code
			echo $_COOKIE['fname'];
			echo $_COOKIE['lname'];
			echo "<br>";
			echo $_COOKIE['role'];
			echo "<br>";
			echo $_SERVER['REMOTE_ADDR'];
			echo "<br>";
			echo $_COOKIE['address']; 
			echo $_COOKIE['state']; 
			echo $_COOKIE['zipcode'];
			$details = array();
			$fname = $_COOKIE['fname'];
			$lname = $_COOKIE['lname'];
			$role = $_COOKIE['role'];
			$address = $_COOKIE['address'];
			$address2 = $_COOKIE['state'];
			$address3 = $_COOKIE['zipcode'];
			echo $link_address;*/

		?>
		<h2><a href = "aproducts.php">Add Products</a></h2>
		<h2><a href = "vproducts.php">View Products</a></h2>
		<h3><a href = "logout.php">Sign Out</a></h3>
		</div>
		</fieldset>
	</body>

</html>