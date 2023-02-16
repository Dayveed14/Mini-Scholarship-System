<?php
require_once("includes/functions.php");

//find session
session_start();

// unset session
$_SESSION = array();

//destroy session cookie

if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-4200, '/');
}

//destroy session

session_destroy();
redirect_to("index.php");
?>