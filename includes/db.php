<?php
require("constants.php");
$servername = DB_SERVER;
$username = DB_USER;
$password = DB_PASS;
$dbname = DB_NAME;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Database connection failed: " . mysqli_error($conn));
} else {
	$db_select = mysqli_select_db($conn, DB_NAME);
	if (!$db_select) {
		die("Database selection failed: " . mysqli_error($conn));
	}
}
?>