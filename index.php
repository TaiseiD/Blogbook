<?php 
session_start();
$page_title = 'BlogBook';
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5 bg-light">
    <div class="container text-center">
        <h1 class="mb-4">Welcome to BlogBook 📖</h1>
        <p class="lead mb-4">A simple blog system with user registration and login functionality.</p>

        <a href="register.php" class="btn btn-primary btn-lg me-2">Register</a>
        <a href="login.php" class="btn btn-success btn-lg">Login</a>
    </div>
</div>

<?php include('includes/footer.php'); ?>
