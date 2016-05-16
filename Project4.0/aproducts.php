<html>
	<head>
		<title>Add Products</title>
	</head>
	<body>
		<form action="adproducts.php" method = "post">			
			<fieldset>
				<legend>Add Product:</legend>
					<h3>Product Name: </h3><input type = "text" name = "name">
					<h3>Description: </h3><input type = "text" name = "description">
					<h3>Sell Price: </h3><input type = "number" name = "sell_price">
					<h3>Cost: </h3><input type = "number" name = "cost">
					<h3>Quantity: </h3><input type = "number" name = "quantity">
					<h3>Select Vendor: </h3> 
					<select placeholder="Vendor" name="vendor" require>
					<option selected='none'>Select a Vendor</option>
					<!--drop down menu for vendors-->
					<?php 
					require("mysqliConnect.php");
					$query = "select V_Id, Name from Vendors";
					$result = mysqli_query($dbc,$query);
					
					
					//Loop through the query results, outputing the options one by one
					while($row = mysqli_fetch_array($result)){
						$vendorId = $row['V_Id'];
						$vendorName = $row['Name'];
						echo "<option value=$vendorId>$vendorName</option>";
					}

					echo'</select>';

					echo "<h3><a href= welcome.php>Home Page</a></h3>";
					echo "<h2><a href = vproducts.php>View Products</a></h2>";

					?>
					<input type="Submit" value="submit" name="submit">
			</fieldset>
		</form>

	</body>

</html>
