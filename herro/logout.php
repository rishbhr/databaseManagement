<html>
	<head>
		<title>Logout Page</title>
	</head>
	<body>
		<?php
		foreach($_COOKIE as $kcookie => $vcookie){
			unset($_COOKIE[$kcookie]);
   			setcookie($kcookie, null, -1);
		}
//   		if(isset($_COOKIE['userDetails'])) {
   			//clear cookies
//   			setcookie("userDetails", null, -1);
//   			setcookie("ipDeets", null, -1);
//   			setcookie("ip", null, -1);
//   		}

      	echo "You Have Been Logged Out, Thankyou for visiting.";
		?>
	</body>
</html>