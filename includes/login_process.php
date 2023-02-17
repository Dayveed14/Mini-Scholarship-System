<?php
require_once("sessions.php");
require('db.php');
require_once("functions.php");

// If form submitted, insert values into the database.

$username = stripslashes($_REQUEST['username']); // removes backslashes
$username = mysqli_real_escape_string($conn, $username); //escapes special characters in a string
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);



$query = "SELECT * FROM users WHERE reg_number='$username' and hashed_password='" . sha1($password) . "'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
  $found_user = mysqli_fetch_array($result);
  $_SESSION['user_id'] = $found_user['id'];
  $_SESSION['username'] = $found_user['reg_number'];
  $_SESSION['role'] = $found_user['roles'];
  if ($found_user['roles'] === '1') {
    redirect_to("../admin_index.php"); // Redirect user to staff.php
  } elseif ($found_user['roles'] === '2') {
    redirect_to("../user_index.php"); // Redirect user to staff.php
  }
} else {
  echo "<div class='form'><h3>Username/password is incorrect.</h3>
      <br/>Click here to <a href='../index.php'>Login</a></div>";
}
?>