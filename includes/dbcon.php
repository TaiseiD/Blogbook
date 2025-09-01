<?php
$host = "localhost";
$username = "root";
$password = ""; // leave empty if you didn’t set a password
$database = "blogbook_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
