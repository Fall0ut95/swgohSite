<!doctype html>
<html lang="en">
<head>
</head>

<body>

<?php

session_start();

// just to check if the session is working
if ( isset( $_SESSION[ 'logged_in' ] ) ) {
	echo 'Hey, ' . $_SESSION[ 'name' ];

	echo ' (<a href="logout.php">Log Out</a>)';

	echo '<br>';
}

?>

<a href="login.php">Log In</a> | <a href="register.php">Register</a>

</body>
</html>
