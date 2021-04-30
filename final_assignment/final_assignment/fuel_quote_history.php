<?php include('server.php')?>
<!DOCTYPE html>
<html>
	<style>
		table{
			width: 800px;
		}
		th, td{
			text-align: left;
			padding: 10px;
		}
		table, th, td{
			border: 1px solid #000;
			border-collapse: collapse;
		}
		tr:nth-child(even){
			background-color: #fff;
		}
		tr:nth-child(odd){
			background-color:#aaa;
		}
		
		.homeButton{
			padding: 10px 20px;
			position: absolute;
			left: 500px;
			top: 20px;
		}
		
	</style>
	<header>
		<h1>Fuel Quote History</h1>
		<h2><?php echo $_SESSION["company_name"] ?></h2>
	</header>
	<body>	
		<a href="dashboard.php"><button class="button">Home</button></a>
		
		<table>
			Example Table</caption>
			<tr>
				<th>Date Ordered</th>
				<th>Delivery Date</th>
				<th>Delivery Address</th>
				<th>Gallon Ordered</th>
				<th>Quote</th>
				<th>Order Status</th>
			</tr>
			<?php
			$company_name = $_SESSION["company_name"];
			$query = "SELECT * FROM quotes WHERE company_name = '$company_name'";

			$result = mysqli_query($db, $query);
			if (!$result) 
				die(mysqli_error($db));

			while($row = $result->fetch_assoc())
			{
				echo "<tr>".
						"<td>". $row["order_date"]."</td>".
						"<td>". $row["delivery_date"]."</td>".
						"<td>". $row["address"]."</td>".
						"<td>". $row["gallon_ordered"]."</td>".
						"<td>". $row["price"]."</td>".
						"<td>". $row["status"]."</td>".
					"</tr>";
			}
			?>
		</table>
		
	</body>
</html>