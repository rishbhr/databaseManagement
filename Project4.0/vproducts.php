<html>
	<head>
		<title>View Products</title>
	</head>
	<body>
		<?php
			require("mysqliConnect.php");

			$query = "SELECT * FROM Products_ranaris";
			$result = mysqli_query($dbc, $query);

			if($result > 0){
				echo "<table border= '1'><th>ID</th><th>Name</th><th>Description</th><th>Sell Price</th><th>Cost</th><th>Quantity</th><th>User Id</th><th>Vendor Id</th>";
				while($row = mysqli_fetch_array($result)){
        			echo "<tr><td>".$row["id"]."</td><td>"
        			.$row["name"]."</td><td>"
        			.$row["description"]."</td><td>"
        			.$row["sell_price"]."</td><td>"
        			.$row["cost"]."</td><td>"
        			.$row["quantity"]."</td><td>"
        			.$row["user_id"]."</td><td>"
        			.$row["vendor_id"]."</td></tr>";
    			}
    			echo "</table>";
			}
			
			echo "<h3><a href= welcome.php>Home Page</a></h3>";
			echo "<h3><a href= aproducts.php>Add Producs</a></h3>";
		?>
	</body>
</html>