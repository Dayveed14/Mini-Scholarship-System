<?php
require_once("sessions.php");
require('db.php');
require_once("functions.php");

// If form submitted, insert values into the database.

$errors = array();
$required_fields = array('reg_number', 'session', 'semester', 'gpa', 'course_num');
check_required_fields($required_fields);

if (empty($errors)) {
	$reg_number = trim($_POST['reg_number']);
	$session = trim($_POST['session']);
	$semester = trim($_POST['semester']);
	$gpa = trim($_POST['gpa']);
	$course_num = trim($_POST['course_num']);

	$sql = "INSERT INTO results (id, reg_number, session, semester, gpa, subjects_number) VALUES ('', '$reg_number', '$session', '$semester', '$gpa', '$course_num')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("refresh: 2; url= ../admin_index.php");
		echo "Result recorded";
	} else {
		header("refresh: 2; url= ../add_results.php");
		echo "Failed to add result";
	}
} else {
	echo "Form Error";
}
?>