<?php

// Connect to DB
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', 'root');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'guild_info');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

?>