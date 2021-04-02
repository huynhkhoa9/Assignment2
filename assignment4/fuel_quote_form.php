<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Fuel Quote</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
    <h1> Fuel Quote</h1>
	<div class="login-form">
		<form method="POST" action="server.php">
			<?php include('errors.php') ?>
			<div class="group">
				<label for="gallons" class="label required">Gallons Requested</label>
				<input id="gallons" type="number" class="input" min="0" required>
			</div>
			<div class="group">
				<label for="address" class="label">Delivery Address:  </label>
				<h3><?php echo $_SESSION["delivery_address"]; ?> </h3>
			</div>
			<div class="group">
				<label for="deliveryDate" class="label required">Delivery Date:</label>
				<input type="date" name="deliveryDate" id="deliveryDate" required>
			</div>
			<div class="group">
				<label for="price" class="label">Suggested Price/Gallon($)</label>
				<input id="price" type="number" class="input" value="2" readonly>
			</div>  
			<div class="group">
				<label for="totalamount" class="label">Total Amount Due($)</label>
				<input id="totalamount" type="number" class="input" value="0" readonly>
			</div> 
			<div class="group">
				<p><span class="required"></span> indicates required field.</p>
				<button type="submit" name="submit_order" class="button"> Submit Order </button>
			</div>
		</form>
			<div class="group">
				<a href="dashboard.php"><button class="button">Cancel</button></a>
			</div>
		</div>	
    </div>
   </div>

      <script src="./js/script.js"></script>

</body>
</html>