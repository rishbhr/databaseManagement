<html>
	<head>
		<title>Updated Products</title>
	</head>

	<body>
		<?php
			require("mysqliConnect.php");

			$prodID = $_POST['prodID'];
			$prodName = $_POST['prodName'];
			$desc = $_POST['desc'];
			$price = $_POST['price'];
			$cost = $_POST['cost'];
			$quantity = $_POST['quantity'];
			$user = $_POST['user'];
			$vendor = $_POST['vendor'];
			
			$userDets = $_COOKIE['userDetails'];
			$userid = $userDets['id'];

			$sizeOfTable = sizeof($prodID);

			for ($i = 0; $i <= $sizeOfTable; $i++) {
				if (empty($desc[$i]) || empty($cost[$i]) || empty($price[$i]) || empty($quantity[$i])) {
					echo "fill all fields";
					die();
				}
				elseif($cost[$i] < 0 || $price[$i] < 0 || $quantity[i] < 0) {
					echo"Please enter Positive numbers only";
					die();
				}
				elseif($price[i] < $cost(i)){
					echo"Price cannot be lower than cost";
					die();
				}
				else {
					$query = "select * from Product_ranaris where id = $prodID[$i] and (sell_price != $price[$i] or quantity != $quantity[$i] or cost != $cost[$i] or desc != $desc[$i])";
					
					$result = mysqli_query($dbc, $query);

					$changes = mysqli_fetch_array($result);

					if($changes > 0){
						$query1 = "update Product_ranaris set description = $desc[$i], cost = $cost[$i], sell_price = $sell_price[$i], user_id = $userid where id = $prodID[$i] and (sell_price != $price[$i] or quantity != $quantity[$i] or cost != $cost[$i] or desc != $desc[$i])";
						if(mysqli_query($dbc, $query1)){
							echo "Product $prodID[$i] updated Successfully";
						}
					}
				}
			}


		?>
	</body>