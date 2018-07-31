<?php

// uncomment the next three lines to display errors/warnings
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require 'lib/config.php';

if ( isset( $_POST[ 'run_installer' ] ) && $_POST[ 'run_installer' ] ) {
	try {
		$connection = new PDO( "mysql:host=$host", $username, $password, $options );
		$sql = file_get_contents( 'lib/init.sql' );

		$connection -> exec( $sql );
	} catch ( PDOException $error ) {
		echo $sql . '<br>' . $error -> getMessage();

		exit;
	}
}

?><!doctype html>
<html>
<head>

</head>
<body>

<h1>Site Installation</h1>

<p>Before doing this, make sure you've updated the configuration file with the database connection info.</p>

<form method="POST" action="db-setup.php">
	<input type="hidden" name="run_installer" value="1">

	<button type="submit">Run Database Setup</button>
</form>

<?php

if ( count( $errors ) > 0 ) {
	echo '<ul class="errors">';
		foreach ( $errors as $error ) {
			echo '<li>' . $error . '</li>';
		}
	echo '</ul>';
}

?>

</body>
</html>
