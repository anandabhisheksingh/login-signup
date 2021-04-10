<?php

session_start();

// Retrieve the session variable
$username = $_SESSION['username'];

// Remove session variable
unset($_SESSION['username']);

// Destroy the session
session_destroy();

// Redirect back to login page
header("location: login-form.php");
exit();
