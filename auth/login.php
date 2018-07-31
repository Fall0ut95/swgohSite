<?php

// uncomment the next three lines to display errors/warnings
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// stores database connection settings (user name, password, etc.)
require 'lib/config.php';

// continue an existing session if it's a thing
session_start();

// if the user is already logged in, redirect to the my account page
if ( isset( $_SESSION[ 'logged_in' ] ) ) {
	header( 'Location: myaccount.php' );
}

// create empty array for storing errors. there's probably a better way to handle this.
$errors = array();

// if the form was just submitted, try the login process.
if ( isset( $_POST[ 'submit' ] ) ) {
	// make sure at least an email and a password came through.
	if ( !empty( $_POST[ 'email' ] ) && !empty( $_POST[ 'password' ] ) ) {
		// create an array for later use
		$user_data = array(
			'email' => $_POST[ 'email' ],
			'password' => $_POST[ 'password' ]
		);

		// try to connect to the DB
		try {
			// create db connection
			$db_connection = new PDO( $dsn, $username, $password, $options );

			// this statement will get used with PDO prepare, hence the :email
			$login_statement = "SELECT * FROM users WHERE email = :email";

			// prepare the db call
			$login_user = $db_connection -> prepare( $login_statement );

			// query the DB
			$login_user -> execute( array( 'email' => $user_data[ 'email' ] ) );

			// check to see if a record comes back for that email
			if ( $login_user -> rowCount() == 1 ) {
				// loop through the results (there should be only one)
				while ( $row = $login_user -> fetch() ) {
					// compare hashed passwords
					if ( password_verify( $user_data[ 'password' ], $row[ 'password' ] ) ) {
						// start the session (or continue it technically)
						session_start();

						// set session variables
						$_SESSION[ 'email' ] = $row[ 'email' ];
						$_SESSION[ 'name' ] = $row[ 'name' ];
						$_SESSION[ 'logged_in' ] = 1;

						// user successfully authenticated, redirect to home page or wherever
						header( 'Location: myaccount.php' );
					} else {
						$errors[] = 'No account was found with that user name and password.';
					}
				}
			} else {
				$errors[] = 'No account was found with that user name and password.';
			}
		} catch ( PDOException $e ) {
			$errors[] = 'There was an error connecting to the database: ' . $e -> getMessage();
		}
	} else {
		// very simple error message. this can get more complicated later.
		$errors[] = 'Please fill out all fields.';
	}
}

?><!doctype html>
<html>
<head>

</head>
<body>

<form method="POST" action="login.php">
	<h1>Log In</h1>

	<ul>
		<li><input type="text" name="email" id="email" placeholder="Email Address"></li>
		<li><input type="password" name="password" id="password" placeholder="Password"></li>
		<li><button type="submit" name="submit" value="login">Log In</button></li>
	</ul>
</form>

<?php

// show any login errors that may have happened
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
