<?php

// get existing session data
session_start();

// empty out the session array
$_SESSION = array();

// cancel the session
session_destroy();

// redirect to the home page
header( 'Location: index.php' );

?>
