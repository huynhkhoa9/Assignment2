<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Submit Order</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<div class="login-wrap">
    <div class="login-html">
        <h1>Submit Order</h1>
        <form method="POST" action="server.php">
            <div>
                <h2>Company Name:</h2>
                    <p><?php echo $_SESSION["company_name"] ?></p>
                <h2>Address: </h2>
                    <p><?php echo $_SESSION["delivery_address"] ?></p>
                <h2>Price: </h2>
                    <p>$<?php echo $_SESSION["quote"] ?></p>
                <h2>Order Date: </h2>
                    <p><?php echo $_SESSION["order_date"] ?></p>
                <h2>Delivery Date:</h2>
                    <p><?php echo $_SESSION["delivery_date"] ?></p>
            </div>
            <div>
				<button type="submit" name="place_order" class="button"> Place Order </button>
		    </div>
		</form>
		<div>
			<a href="fuel_quote_form.php"><button class="button">Cancel</button></a>
		</div>
    </div>
</div>
</body>
</html>