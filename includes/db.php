<?php
$host = "localhost";
$user = "root";     // default for phpMyAdmin
$pass = "";         // leave empty if no password
$db   = "blogbook"; // your database name

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
