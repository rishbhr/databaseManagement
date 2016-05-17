<html>
	<head>
		<title>Search Results</title>
	</head>
	<body>
		<?php
			require("mysqliConnect.php");
			$keyword = trim($_GET["keywords"]);
			if ($keyword === "*") {
				$query = "select * from Products_ranaris";
				
			}
			elseif (empty($keyword)) {
				echo "NO empty values";
			}
			elseif ($keyword != "*" && !empty($keyword)){
			$query = "select * from Products_ranaris where name='$keyword' or description like '%$keyword%'";
			$result = mysqli_query($dbc, $query);
			
			if (mysqli_num_rows($result) < 1) {
				echo "no products found";
			}		
			else {
			
			//do table
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
		}
		?>
	</body>
</html>
