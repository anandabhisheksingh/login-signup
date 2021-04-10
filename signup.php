<?php

if (isset($_POST['signup-submit'])) {
    require 'db-connection.php';

    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    if (empty($userName) || empty($email) || empty($password) || empty($name)) {
        header("location: signup-form.php?error=emptyfields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: signup-form.php?error=invalid-email");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("location: signup-form.php?error=invalid-username");
        exit();
    } else {

        // Check if a user already exists with the given username
        $sql = "select username from users where username=?;";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: signup-form.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("location: signup-form.php?error=usertaken");
            exit();
        } else {

            $sql = "insert into users(username, password, name, email) "
                . "values (?,?,?,?)";
            $stmt = mysqli_stmt_init($db);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: signup-form.php?error=sqlerror");
                exit();
            } else {

                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "ssss", $userName, $hashedPwd, $name, $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                header("location: signup-form.php?signup=success");
                exit();
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db);
} else {
    header("location: signup-form.php");
    exit();
}
