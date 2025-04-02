<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'includes/header.php';
?>

<div class="container text-center mt-5">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>You have successfully logged in.</p>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>

<?php include 'includes/footer.php'; ?>
