<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="My authentication form">
    <meta property="og:description" content="Create an account, Log in and log out.">
    <meta property="og:image" content="screenshot-home.png">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Hello, <?php echo $_SESSION['username']; ?> !</h2>
        <button><a href="logout.php">Log out</a></button>
    </div>
</body>

</html>