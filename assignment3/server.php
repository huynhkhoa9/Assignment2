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
		$query = "INSERT INTO user_logins (username, email, password) VALUES ('$username', '$email', '$password')";
		$query2 = "INSERT INTO user_details (username) VALUES ('$username')";
		
		mysqli_query($db, $query);
		mysqli_query($db, $query2);
		
		$_SESSION["username"] = $username;
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
		
		$query = "SELECT * FROM user_logins WHERE username='$username' AND password='$password' ";
		$results = mysqli_query($db, $query);
		if(mysqli_num_rows($results))
		{
			$_SESSION["username"] = $username;
			$_SESSION["sucess"] = "Logged in sucessfully";
			
			header("location: dashboard.php");
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
	$address_1 = mysqli_real_escape_string($db, $_POST["address_1"]);
	$address_2 = mysqli_real_escape_string($db, $_POST["address_2"]);
	$city = mysqli_real_escape_string($db, $_POST["city"]);
	$state = mysqli_real_escape_string($db, $_POST["state"]);
	$zipcode = mysqli_real_escape_string($db, $_POST["zipcode"]);
	
	//form validation
	if(empty($username)){array_push($errors, "Username is required");}
	if(empty($address_1)){array_push($errors, "Main address is required");}
	if(empty($city)){array_push($errors, "City is required");}
	if(empty($state)){array_push($errors, "State is required");}
	if(empty($zipcode)){array_push($errors, "Zipcode is required");}
	
	if(count($errors) == 0)
	{
		$insert_query = "INSERT INTO user_details (username, address_1, address_2, city, state, zipcode) 
						VALUES ('$username', '$address_1', '$address_2', '$city', '$state', '$zipcode')
						ON DUPLICATE KEY UPDATE
							address_1='$address_1',
							address_2='$address_2',
							city='$city',
							state='$state',
							zipcode='$zipcode' ";
		
		mysqli_query($db, $insert_query);
		
		$_SESSION["username"] = $username;
		$_SESSION["sucess"] = "Updated profile sucessfully";
			
			header("location: dashboard.php");
	}
}
?>