<?php
session_start();
include('includes/db.php');

if (isset($_POST['registerBtn'])) {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if ($password !== $confirmPassword) {
        $_SESSION['message'] = "Passwords do not match!";
        header("Location: register.php");
        exit(0);
    }

    $checkEmailQuery = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $checkEmailRun = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailRun) > 0) {
        $_SESSION['message'] = "Email already registered!";
        header("Location: register.php");
        exit(0);
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$hashedPassword')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['message'] = "Registered Successfully! Please login.";
            header("Location: login.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Something went wrong. Try again.";
            header("Location: register.php");
            exit(0);
        }
    }
}
?>
