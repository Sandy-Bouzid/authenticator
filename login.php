<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="My authentication form">
    <meta property="og:description" content="Create an account, Log in and log out.">
    <meta property="og:image" content="screenshot-home.png">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <p class="errorMessage"><?= isset($_GET['error']) ? $_GET['error'] : ''; ?></p>
        <form method="post" action="authentication.php">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <button type="submit">Log in</button>
        </form>
    </div>
</body>


</html>