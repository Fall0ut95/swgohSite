<?php
	session_start();

	$username = "";
	$email = "";
	$errors = array();

	//Connect to the database
	$db = mysqli_connect('127.0.0.1', 'root', 'root', 'swgohRegistration');

	// if the register button is clicked
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password1 = mysqli_real_escape_string($db, $_POST['password1']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);

		//ensure that the form fields are filled properly
		if(empty($username)) {
			array_push($errors, "Username is required"); //add error to array
		}
		if(empty($email)) {
			array_push($errors, "Email is required"); //add error to array
		}
		if(empty($password1)) {
			array_push($errors, "Password is required"); //add error to array
		}
		if($password1 != $password2) {
			array_push($errors, "The two passwords do not match"); //add error to array
		}

		//if there are no errors, save user to DB
		if (count($errors) == 0) {
			$password = md5($password1); //encrypt pw before storing it in DB

			$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			$_SERVER['success'] = "You are now logged in";
			header('location: index.html'); //redirects to homepage
		}
	}
?>