<?php 
session_start();
$page_title = 'Dashboard';
include('includes/header.php');
include('includes/navbar.php');

if(!isset($_SESSION['auth_user'])) {
    $_SESSION['message'] = "Please login to access the dashboard.";
    header("Location: login.php");
    exit(0);
}
?>

<div class="py-5">
    <div class="container">
        <div class="col-md-12 text-center">
            <div class="card">
                <div class="card-header">
                    <h4>User Dashboard</h4>
                </div>
                <div class="card-body">
                    <h5>Welcome, <?php echo $_SESSION['auth_user']['name']; ?> 👋</h5>
                    <p>Email: <?php echo $_SESSION['auth_user']['email']; ?></p>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
