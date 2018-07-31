<?php

// this file exists so it can get checked into source control.
// just enter your information and rename the file to config.php

$host = '[your host goes here]';
$username = '[your db username goes here]';
$password = '[your db password goes here]';
$dbname = '[your db name goes here]';
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

?>
