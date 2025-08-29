<?php
session_start();
include('includes/db.php');

if(isset($_POST['loginBtn'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($login_query_run) > 0) {
        $row = mysqli_fetch_assoc($login_query_run);

        if(password_verify($password, $row['password'])) {
            $_SESSION['auth_user'] = [
                'name' => $row['name'],
                'email' => $row['email']
            ];
            $_SESSION['message'] = "Welcome back, ".$row['name']."!";
            header("Location: dashboard.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Invalid password.";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "No account found with that email.";
        header("Location: login.php");
        exit(0);
    }
}
?>
