<?php
include_once("db-connection.php");

// Start a session in the beginning 
session_start();
if (isset($_POST['login-submit'])) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("location: login-form.php?error=emptyfields");
    }

    $inEmail = $_POST["email"];
    $inPassword = $_POST["password"];

    // Fetching all the records with input credentials
    $sql = "select username, password from users where email=?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: login-form.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $inEmail);
    mysqli_stmt_execute($stmt);

    // Bind variables to prepared statement
    mysqli_stmt_bind_result($stmt, $username, $password);

    // Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
    if (mysqli_stmt_fetch($stmt) && password_verify($inPassword, $password)) {

        // Store the username value in session variable so that it can be retrieved on other pages
        $_SESSION['username'] = $username;

        // Redirect to profile page
        header("location: user-profile.php"); 
    } else {
        header("location: login-form.php?error=wrong-credential");
    }
}