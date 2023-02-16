<?php
require_once("sessions.php");
require('db.php');
require_once("functions.php");

// If form submitted, insert values into the database.

$errors = array();
$required_fields = array('amount', 'due_date', 'penalty', 'closing_date', 'session', 'semester');
check_required_fields($required_fields);

if ( empty($errors)) {
    $amount = trim($_POST['amount']);
    $due_date = trim($_POST['due_date']);
    $penalty = trim($_POST['penalty']);
    $closing_date = trim($_POST['closing_date']);
	$session = trim($_POST['session']);
	$semester = trim($_POST['semester']);
    
    $sql = "INSERT INTO fee (id, amount, date_due, penalty, date_closed, session, semester) VALUES ('', '$amount', '$due_date', '$penalty', '$closing_date', '$session', '$semester')";
	$result = mysqli_query($conn, $sql);
    if ($result) {
		header("refresh: 2; url= ../admin_index.php");
		echo "Fee added";
	}
	else{
		header("refresh: 2; url= ../add_fee.php");
		echo "Failed to add fee";
	}
}
else{
	echo "Form Error";
}
?>