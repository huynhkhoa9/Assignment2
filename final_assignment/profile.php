<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>profile</title>
    <link rel="stylesheet" href="./css/styles.css">
	
</head>

<body>
  <div class="login-wrap">
      <div class="login-html">
		  <h1>User Profile</h1>
			<h3><?php echo $_SESSION["delivery_address"]?></h2>
        <div class="login-form">
		<form method="POST" action="server.php">
          <div class="group">
            <label for="username" class="label required">Name</label>
            <input name="username" id="username" type="text" class="input" value=<?php echo $_SESSION["username"]?> required>
          </div>
		   <div class="group">
            <label for="companyname" class="label required">Company Name</label>
            <input name="companyname" id="companyname" type="text" class="input" value=<?php echo $_SESSION["company_name"]?> required>
          </div>
          <div class="group">
            <label for="address_1" class="label required">Address 1</label>
            <input name="address_1" id="address_1" type="text" class="input" required>

            <br/>
            <label for="address_2" class="label optional">Address 2 (Optional)</label>
            <input name="address_2" id="address_2" type="text" class="input">
          </div>

          <div class="group">
            <label for="city" class="label required">City</label>
            <input name="city" id="city" type="text" class="input" required>
          </div>

          <div class="group">
            <label for="state" class="select required">State</label>
            <select name="state" id="state" class="input" required>
              <option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AS">American Samoa</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Arkansas</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="GU">Guam</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
				    <option value="MD">Maryland</option>
				    <option value="MA">Massachusetts</option>
				    <option value="MI">Michigan</option>
				    <option value="MN">Minnesota</option>
				    <option value="MS">Mississippi</option>
				    <option value="MO">Missouri</option>
				    <option value="MT">Montana</option>
				    <option value="NE">Nebraska</option>
				    <option value="NV">Nevada</option>
				    <option value="NH">New Hampshire</option>
				    <option value="NJ">New Jersey</option>
				    <option value="NM">New Mexico</option>
				    <option value="NY">New York</option>
				    <option value="NC">North Carolina</option>
				    <option value="ND">North Dakota</option>
					<option value="MP">Northern Mariana Island</option>
					<option value="OH">Ohio</option>
				    <option value="OK">Oklahoma</option>
				    <option value="OR">Oregon</option>
				    <option value="PA">Pennsylvania</option>
				    <option value="RI">Rhode Island</option>
				    <option value="SC">South Carolina</option>
				    <option value="SD">South Dakota</option>
				    <option value="TN">Tennessee</option>
				    <option value="TX">Texas</option>
				    <option value="UT">Utah</option>
				    <option value="VT">Vermont</option>
				    <option value="VA">Virginia</option>
					<option value="VI">Virgin Islands</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
            </select>         
           </div>

           <div class="group">
            <label for="zipcode" class="label required">ZIP</label>
            <input name="zipcode" id="zipcode" type="number" class="input" min="0" required>
          </div>
          
          <div class="group">
			<p><span class="required"></span> indicates required field.</p>
            <button type="submit" name="update_user" class="button"> Update Profile </button>
          </div>
        </form>
			<div class="group">
				<a href="dashboard.php"><button class="button">Home</button></a>
			</div>
        </div>
        </div>
    </div>
  </div>
      <script src="./js/script.js"></script>

</body>
</html>