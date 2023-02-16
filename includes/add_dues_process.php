<?php
require_once("sessions.php");
require('db.php');
require_once("functions.php");

// If form submitted, insert values into the database.

$errors = array();
$required_fields = array('amount', 'due_date', 'session');
check_required_fields($required_fields);

if ( empty($errors)) {
    $amount = trim($_POST['amount']);
    $due_date = trim($_POST['due_date']);    
	$session = trim($_POST['session']);
    
    $sql = "INSERT INTO dues (id, amount, date_due, session) VALUES ('', '$amount', '$due_date','$session')";
	$result = mysqli_query($conn, $sql);
    if ($result) {
		header("refresh: 2; url= ../admin_index.php");
		echo "Fee added";
	}
	else{
		header("refresh: 2; url= ../add_dues.php");
		echo "Failed to add fee";
	}
}
else{
	echo "Form Error";
}
?>