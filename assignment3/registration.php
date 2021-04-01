<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>REGIRSTRATION</title>
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Register</h2>
		</div>
		<form action="server.php" action="POST">
		
			<?php include('errors.php') ?>
		
			<div>
				<label for="username" class="label required">Username</label>
				<input name="username" type="text" class="input" required>
			</div>
			<div>
				<label for="password_1" class="label required">Password</label>
				<input name="password_1" type="password" class="input" data-type="password" required>
			</div>
			<div>
				<label for="password_2" class="label required">Repeat Password</label>
				<input name="password_2" type="password" class="input" data-type="password" required>
			</div>
			<div>
				<label for="email" class="label required">Email Address</label>
				<input name="email" type="text" class="input" required>
			</div>
			<div class="group">
				<p><span class="required"></span> indicates required field.</p>
				<button type="submit">Sign Up</button>
			</div>
		</form>
	</div>
</body>
</html>