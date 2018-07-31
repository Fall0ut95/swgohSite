<?php

// uncomment the next three lines to display errors/warnings
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// get database connection settings
require( 'lib/config.php' );

// continue an existing session if there is one
session_start();

// if the user is already logged in, redirect to the my account page
if ( isset( $_SESSION[ 'logged_in' ] ) ) {
	header( 'Location: myaccount.php' );
}

// create empty array for errors and such
$errors = array();

// if the form was submitted, try to register a user
if ( isset( $_POST[ 'submit' ] ) ) {
	// make sure all of the required fields came through
	if ( !empty( $_POST[ 'name' ] ) && !empty( $_POST[ 'email' ] ) && !empty( $_POST[ 'password' ] ) ) {
		// create user array for later
		$user_data = array(
			'name' => $_POST[ 'name' ],
			'email' => $_POST[ 'email' ],
			'password' => password_hash( $_POST[ 'password' ], PASSWORD_DEFAULT )
		);

		// try to connect to the database
		try {
			// new DB connection
			$db_connection = new PDO( $dsn, $username, $password, $options );

			// prepare the existing user check
			$existing_user_statement = "SELECT * FROM users WHERE email = :email";

			$existing_user = $db_connection -> prepare( $existing_user_statement );

			// fire off the query
			$existing_user -> execute( array( 'email' => $user_data[ 'email' ] ) );

			// check if there are any returned values
			if ( $existing_user -> rowCount() > 0 ) {
				$errors[] = 'An account using that email address already exists.';
			} else {
				$create_user_statement = "INSERT INTO users(email, password, name) VALUES(:email, :password, :name)";

				$create_user = $db_connection -> prepare( $create_user_statement );

				$create_user -> execute( $user_data );

				session_start();

				$_SESSION[ 'email' ] = $user_data[ 'email' ];
				$_SESSION[ 'name' ] = $user_data[ 'name' ];
				$_SESSION[ 'logged_in' ] = 1;

				header( 'Location: myaccount.php' );
			}
		} catch ( PDOException $e ) {
			$errors[] = 'There was an error connecting to the database: ' . $e -> getMessage();
		}
	} else {
		$errors[] = 'Please fill out all fields.';
	}
}

?><!doctype html>
<html lang="en">
<head>
</head>

<body>

<form method="POST" action="register.php">
	<h1>Register</h1>
	<ul>
		<li><input type="text" name="name" id="name" placeholder="Your Name"></li>
		<li><input type="text" name="email" id="email" placeholder="Email Address"></li>
		<li><input type="password" name="password" id="password" placeholder="Password"></li>
		<li><button type="submit" name="submit" value="register">Register</button>
	</ul>
</form>

<?php

// show any registration errors that may have happened
if ( count( $errors ) > 0 ) {
	echo '<div class="errors">';
		echo '<ul>';

		foreach ( $errors as $error ) {
			echo '<li>' . $error . '</li>';
		}

		echo '</ul>';
	echo '</div>';
}

?>

</body>
</html>
