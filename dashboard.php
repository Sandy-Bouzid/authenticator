<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Hello, <?php echo $_SESSION['username']; ?>!</h2>
    <button><a href="logout.php">Log out</a></button>
</body>
</html>
