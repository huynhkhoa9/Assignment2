<?php 
	session_start();
	
	if(!isset($_SESSION['username']))
	{
		$_SESSION['msg'] = "You must log in first to view this page";
		header('location: index.html');
	}
	if(isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.html');
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fuel Quote</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
          <h1> Dashboard</h1>
		  <?php if(isset($_SESSION['success'])): ?>
			<div>
			<h3>
				<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
		<?php endif ?>
		<?php if(isset($_SESSION['username'])) :?>
			<h3>Welcome <strong><?php echo $_SESSION["username"]; ?></strong></h3>
		
        <div class="login-form">
			<div class="group">
				<a href="profile.php"><input type="submit" class="button" value="Update Profile"></a>
			</div>
			<div class="group">
				<a href="./fuel_quote_form.php"><input type="submit" class="button" value="Get Quote"></a>
			</div>
			<div class="group">
				<a href="./fuel_quote_history.html"><input type="submit" class="button" value="View Fuel History"></a>
			</div>
			<div class="group">
				<a href="dashboard.php?logout='1'"><button class="button">Logout</button></a>
			</div>
		</div>
		<?php endif ?>
    </div>
  </div>
      <script src="./js/script.js"></script>
</body>
</html>