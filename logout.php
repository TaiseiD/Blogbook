<?php
session_start();
unset($_SESSION['auth_user']);
session_destroy();

$_SESSION['message'] = "You have been logged out.";
header("Location: login.php");
exit(0);
?>
