<html>
	<head>
		<title>Updated Products</title>
	</head>

	<body>
		<?php
			error_reporting(E_ALL);
			ini_set('display_errors', 1);

			require("mysqliConnect.php");

			$query="select * from Products_ranaris";			
			$result= mysqli_query($dbc, $query);			
			$userDets = $_COOKIE['userDetails'];
			$userid = $userDets['id'];

			$sizeOfTable = mysqli_num_rows($result);

			//update the table
			for($i=0; $i < $sizeOfTable; $i++) {
        		$id[$i] = $_POST['prodID'][$i];
       		 	$desc[$i] = $_POST['desc'][$i];
       		 	$sell_price[$i] = $_POST['price'][$i];
        		$cost[$i] = $_POST['cost'][$i];
        		$quantity[$i] = $_POST['quantity'][$i];
        		//update relevant rows
        		$query="UPDATE Products_ranaris SET description = '$desc[$i]', sell_price = '$sell_price[$i]', cost = '$cost[$i]', quantity = '$quantity[$i]' WHERE id = '$id[$i]';";
        		$result = mysqli_query($dbc, $query);
        		//echo $query;
        		//echo"<br>";
    		}

    		$i = sizeof($result);


			//Display the updated table
			$query = "SELECT Products_ranaris.*, Vendors.Name, Users.last_name from Products_ranaris join Vendors on Vendors.V_Id = Products_ranaris.vendor_id join Users on Users.id = Products_ranaris.user_id";
			$result = mysqli_query($dbc, $query);

			if($i > 0){
				echo "<table border= '1'><th>ID</th><th>Name</th><th>Description</th><th>Sell Price</th><th>Cost</th><th>Quantity</th><th>User Name</th><th>Vendor Name</th>";
				while($row = mysqli_fetch_array($result)){
        			echo "<tr><td>".$row["id"]."</td><td>"
        			.$row["name"]."</td><td>"
        			.$row["description"]."</td><td>"
        			.$row["sell_price"]."</td><td>"
        			.$row["cost"]."</td><td>"
        			.$row["quantity"]."</td><td>"
        			.$row["last_name"]."</td><td>"
        			.$row["Name"]."</td></tr>";
    			}
    			echo "</table>";
			}

			//navigation
			echo "<h3><a href= welcome.php>Home Page</a></h3>";
			echo "<h3><a href= aproducts.php>Add Producs</a></h3>";
			echo "<h3><a href= updateProducts.php>Update Products</a></h3>";


		?>
	</body>
