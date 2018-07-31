<?php

// start session
session_start();

// if not logged in, redirect to login page
if ( !isset( $_SESSION[ 'logged_in' ] ) ) {
	header( 'Location: login.php' );
}

?><!doctype html>
<html>
<head>

</head>
<body>

<h1>Welcome, <?php echo $_SESSION[ 'name' ]; ?>!</h1>

<ul>
	<li>Your Name: <?php echo $_SESSION[ 'name' ]; ?></li>
	<li>Your Email: <?php echo $_SESSION[ 'email' ]; ?></li>
</ul>

<a href="logout.php">Log Out</a>

</body>
</html>
