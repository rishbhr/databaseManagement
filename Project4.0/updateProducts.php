<html>
	<head>
		<title>Update Products</title>
	</head>
	<body>
		<form action="uProducts.php" method = "post">
		<?php
			require("mysqliConnect.php");

			$query="select * from Products_ranaris";
			$result = mysqli_query($dbc, $query);

			if($result > 0){
				echo "<table border= '1'>
					  <th>ID</th>
					  <th>Name</th>
					  <th>Description</th>
					  <th>Sell Price</th>
					  <th>Cost</th>
					  <th>Quantity</th>
					  <th>User Name</th>
					  <th>Vendor Name</th>";
				while($row = mysqli_fetch_array($result)){
					$prodID = $row['id'];
					$prodName = $row['name'];
					$desc = $row['description'];
					$price = $row['sell_price'];
					$cost = $row['cost'];
					$quantity = $row['quantity'];
					$user = $row['user_id'];
					$vendorId = $row['vendor_id'];
					//get user name
					$query1 = "select last_name, first_name from Users where id=$user";
					$result1 = mysqli_query($dbc, $query1);
					while ($rows = mysqli_fetch_array($result1)) {
						$fullName = $rows['last_name'] . " " . $rows['first_name'];
					}
					$query2 = "select Name from Vendors where V_Id =$vendorId";
					$result2 = mysqli_query($dbc, $query2);
					while ($rows2 = mysqli_fetch_array($result2)) {
						$vendorName = $rows2['Name'];
					}

        			echo "<tr><td><input type = hidden name='prodID[]' value='$prodID'>$prodID</td>";

					echo "<td><input type = hidden name ='prodName[]' value='$prodName'>$prodName</td>";

					echo "<td><input type = text name ='desc[]' value = '$desc'></td>";

					echo "<td><input type = number name ='price[]' value = '$price'></td>";

					echo "<td><input type = number name ='cost[]' value = '$cost' ></td>";

					echo "<td><input type = number name = 'quantity[]' value = '$quantity'></td>";

					echo "<td><input type = hidden name ='user[]' value = '$user'>$fullName</td>";

					echo "<td><input type = hidden name ='vendor[]' value = $vendorName</td>$vendorName</tr>";
        			
        		/*	while($row2 = mysqli_fetch_array($result)){
						$vendorId = $row['V_Id'];
						$vendorName = $row['Name'];
						echo "<option value=$vendorId>$vendorName</option>";
    				}*/
    			
				}
				echo "</table>";
			}
		?>
			<input type ="submit" value="Submit" name="submit">
		</form>
	</body>
</html>