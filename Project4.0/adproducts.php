<?php
	require("mysqliConnect.php");

	$product_name = $_POST["name"];
	$description = $_POST["description"];
	$sell_price = $_POST["sell_price"];
	$cost = $_POST["cost"];
	$quantity = $_POST["quantity"];
	$vendor = $_POST["vendor"];
	$user = $_COOKIE["user_id"];
	$any_error = true;


	//if cost is less than price enter product information again
	if($cost > $sell_price){
		$any_error = false;
		echo "Were not made of Money!";
		include("aproducts.php");
	}
	if(empty($product_name) || empty($description) || empty($sell_price) || empty($cost) || empty($quantity) || $vendor == "none"){
		$any_error = false;
		echo "Not enough information!";
		include("aproducts.php");
	}
	if($sell_price < 1 || $cost < 1 || $quantity < 1){
		$any_error = false;
		echo "How are you gonna sell something you dont have?";
		include("aproducts.php");
	}

	if($any_error){
		//check product name of exsting record
		$query = "SELECT name FROM Products_ranaris where name = '$product_name'";
		$result = mysqli_query($dbc, $query);

		//if the product is in the database or not
		if(mysqli_num_rows($result) > 0){
			echo "Pick a different product name.";
			die();
		} else{
			$query = "Insert into Products_ranaris values ('', '$product_name', '$description', '$sell_price', '$cost', '$quantity', '$user', '$vendor')";
			if(mysqli_query($dbc, $query)){
				echo "Product Sucessfully Added.";
			} else{
				echo "An error occured try again."; 
			}
		}
	}

	echo "<h3><a href = welcome.php>Home Page</a><h3>";
	echo "<h2><a href = vproducts.php>View Products</a></h2>";



?>
