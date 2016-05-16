<html>
	<head>
		<title>Updated Products</title>
	</head>

	<body>
		<?php
			error reporting(-1);
			ini_set('display_errors','On')

			require("mysqliConnect.php");

			$desc = $_POST['desc'];
			$price = $_POST['price'];
			$cost = $_POST['cost'];
			$quantity = $_POST['quantity'];
			$user = $_POST['user'];
			$vendor = $_POST['vendor'];
			
			$userDets = $_COOKIE['userDetails'];
			$userid = $userDets['id'];

			$sizeOfTable = sizeof($prodID);

			
			for($i = 0; $i < $sizeOfTable; $i++){
				$query1="update Products_ranaris set description = '$desc[$i]', cost = '$cost[$i]', sell_price = '$price[$i]', quantity = '$quantity[$i]' where id = '$id[$id]'";
				$result = mysqli_query($query);

				echo"$prodID[$i], $prodName[$i], $desc[$i], $price[$i], $cost[$i], $quantity[$i], $user[$i], $vendor[$i]";


			}
			
    		echo "<h3><a href= welcome.php>Home Page</a></h3>";
			echo "<h3><a href= vproducts.php>View Producs</a></h3>";


		?>
	</body>