<?php

session_start();

//initializing variables
$username = "";
$email = "";

$errors = array();

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'fuel_db') or die("could not connect to database.");

//registering users
if(isset($_POST["register_user"]))
{
	$username = mysqli_real_escape_string($db, $_POST["username"]);
	$userNameValue = $username;
	$email = mysqli_real_escape_string($db, $_POST["email"]);
	$password_1 = mysqli_real_escape_string($db, $_POST["password_1"]);
	$password_2 = mysqli_real_escape_string($db, $_POST["password_2"]);

	//form validation
	if(empty($username)){array_push($errors, "Username is required");}
	if(empty($email)){array_push($errors, "Email is required");}
	if(empty($password_1)){array_push($errors, "Password is required");}
	if($password_1 != $password_2){array_push($errors, "Passwords need to match");}

	//check database for existing user with same username
	$user_check_query = "SELECT * FROM user_logins WHERE username = '$username' or email = '$email' LIMIT 1";

	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if($user)
	{
		if($user['username'] === $username){array_push($errors, "Username already exists");}
		if($user['email'] === $email){array_push($errors, "Email already been assigned to another user");}
	}

	if(count($errors) == 0)
	{
		$password = md5($password_1);
		$username = md5($username);
		$query = "INSERT INTO user_logins (username, email, password) VALUES ('$username', '$email', '$password')";
		$query2 = "INSERT INTO user_details (username) VALUES ('$username')";
		
		mysqli_query($db, $query);
		mysqli_query($db, $query2);
		
		$_SESSION["username"] = $userNameValue;
		$_SESSION["sucess"] = "You are now logged in"; 
		
		header('location: dashboard.php');
	}
}
//login user
elseif(isset($_POST["login_user"]))
{
	$username = mysqli_real_escape_string($db, $_POST["username"]);
	$password = mysqli_real_escape_string($db, $_POST["password"]);
	
	if(empty($username))
	{
		array_push($errors, "Username is required");
	}
	
	if(empty($password))
	{
		array_push($errors, "Password is required");
	}
	
	if(count($errors) == 0)
	{
		$password = md5($password);
		$userNameValue = $username;
		$username = md5($username);
		$query = "SELECT * FROM user_logins WHERE username='$username' AND password='$password' ";
		$address_query = "SELECT
							company_name,
							address_1,
							city,
							state,
							zipcode
						FROM user_details WHERE username='$username'";
		
		$results = mysqli_query($db, $query);
		$delivery_address_result = mysqli_query($db, $address_query);
		$delivery_address = mysqli_fetch_assoc($delivery_address_result);
		if(mysqli_num_rows($results))
		{
			if(mysqli_num_rows($delivery_address_result))
			{
				$_SESSION["username"] = $userNameValue;
				$_SESSION["delivery_address"] = $delivery_address["address_1"]." ".$delivery_address["city"]." ".$delivery_address["state"].", ".$delivery_address["zipcode"];
				$_SESSION["company_name"] = $delivery_address["company_name"];
				$_SESSION["sucess"] = "Logged in sucessfully";
				
				header("location: dashboard.php");
			}
		}
		else
		{
			array_push($errors, "Wrong username or password");
		}
	}
}
//update profile
elseif(isset($_POST["update_user"]))
{
	//get values from form
	$username = mysqli_real_escape_string($db, $_POST["username"]);
	$userNameValue = $username;
	$username = md5($username);
	$company_name =  mysqli_real_escape_string($db, $_POST["companyname"]);
	$address_1 = mysqli_real_escape_string($db, $_POST["address_1"]);
	$address_2 = mysqli_real_escape_string($db, $_POST["address_2"]);
	$city = mysqli_real_escape_string($db, $_POST["city"]);
	$state = mysqli_real_escape_string($db, $_POST["state"]);
	$zipcode = mysqli_real_escape_string($db, $_POST["zipcode"]);
	$in_state = $state === "TX" ? true : false;
	//form validation
	if(empty($username)){array_push($errors, "Username is required");}
	if(empty($company_name)){array_push($errors, "Company Name is required");}
	if(empty($address_1)){array_push($errors, "Main address is required");}
	if(empty($city)){array_push($errors, "City is required");}
	if(empty($state)){array_push($errors, "State is required");}
	if(empty($zipcode)){array_push($errors, "Zipcode is required");}
	
	if(count($errors) == 0)
	{
		$insert_query = "INSERT INTO user_details (username, company_name, address_1, address_2, city, state, zipcode, in_state) 
						VALUES ('$username', '$company_name', '$address_1', '$address_2', '$city', '$state', '$zipcode', '$in_state')
						ON DUPLICATE KEY UPDATE
							username='$username',
							company_name='$company_name',
							address_1='$address_1',
							address_2='$address_2',
							city='$city',
							state='$state',
							zipcode='$zipcode',
							in_state='$in_state' ";
		
		mysqli_query($db, $insert_query);
		
		$_SESSION["username"] = $userNameValue;
		$_SESSION["company_name"] = $company_name;
		$_SESSION["delivery_address"] = $address_1." ".$city." ".$state.", ".$zipcode;
		$_SESSION["sucess"] = "Updated profile sucessfully";
		$_SESSION["rate"] = $in_state;	
			header("location: dashboard.php");
	}
}
//Get Quote
elseif(isset($_POST["submit_order"]))
{
	$company_name = $_SESSION["company_name"];
	$date = date('Y-m-d H:i:s', $phptime);
	//form validation
	if(empty($company_name)){array_push($errors, "Company Name is required");}
	
	if(count($errors) == 0)
	{
		$insert_query = "INSERT INTO quotes (company_name, order_date, status, last_updated_date, quote_json)
						VALUES ('$company_name','$date','Processing','$date','[]')";
		
		$result = mysqli_query($db, $insert_query);
		if (!$result) {
			die(mysqli_error($db));
		}
		
		$_SESSION["sucess"] = "You submitted an order"; 
			header("location: dashboard.php");
	}
	
	
}
?>