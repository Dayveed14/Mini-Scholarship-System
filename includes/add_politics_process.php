<?php
require_once("sessions.php");
require('db.php');
require_once("functions.php");

// If form submitted, insert values into the database.

$errors = array();
$required_fields = array('position', 'session');
check_required_fields($required_fields);

if ( empty($errors)) {
    $position = trim($_POST['position']);   
	$session = trim($_POST['session']);
	$user = $_SESSION['username'];
    
    $sql = "INSERT INTO political_post (id, position, session, reg_number) VALUES ('', '$position', '$session', '$user')";
	$result = mysqli_query($conn, $sql);
    if ($result) {
		header("refresh: 2; url= ../politics.php");
		echo "Post added";
	}
	else{
		header("refresh: 2; url= ../user_index.php");
		echo "Failed to add fee";
	}
}
else{
	echo "Form Error";
}
?>