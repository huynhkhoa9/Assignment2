
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register/Login</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
		<form method="POST" action="server.php">
		<?php include('errors.php') ?>
		  <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		  <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		  <div class="login-form">
			<div class="sign-in-htm">
			  <div class="group">
				<label for="username" class="label" >Username</label>
				<input name="username" id="username" type="text" class="input" required>
			  </div>
			  <div class="group">
				<label for="password" class="label">Password</label>
				<input name="password" id="password" type="password" class="input" data-type="password" required>
			  </div>
			  <div class="group">
				<input id="check" type="checkbox" class="check" checked>
				<label for="check"><span class="icon"></span> Keep me Signed in</label>
			  </div>
			  <div class="group">
				<button type="submit" name="login_user" class="button"> Login </button>
			  </div>
		  </form>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="http://example.org/">Forgot Password?</a>
          </div>
        </div>
		<form method="POST" action="server.php">
		<?php include('errors.php') ?>	
			<div class="sign-up-htm">
			  <div class="group">
				<label for="username" class="label required">Username</label>
				<input name="username" id="username" class="input" type="text" required>
			  </div>
			  <div class="group">
				<label for="password_1" class="label required">Password</label>
				<input name="password_1" id="password_1" class="input" type="password" data-type="password" required>
			  </div>
			  <div class="group">
				<label for="password_2" class="label required">Repeat Password</label>
				<input name="password_2" id="password_2" class="input" type="password" data-type="password" required>
			  </div>
			  <div class="group">
				<label for="email" class="label required">Email Address</label>
				<input name="email" id="email" class="input" type="text" required>
			  </div>
			  <div class="group">
				<p><span class="required"></span> indicates required field.</p>
				<button type="submit" name="register_user" class="button"> SignUp </button>
			  </div>
		  </form>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Already Member?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
      <script src="./js/script.js"></script>

</body>

</html>