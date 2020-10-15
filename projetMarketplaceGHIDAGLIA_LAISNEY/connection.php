<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ebayECE";

$mysqli = new mysqli("localhost","username","password","dbname");

// Check connection
if ($mysqli -> connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();
} else {
	
	echo "Connection Successful";
}

?>