<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="My authentication form">
    <meta property="og:description" content="Create an account, Log in and log out.">
    <meta property="og:image" content="screenshot-home.png">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Authentication form</title>
</head>

<body>
    <div class="container">
        <h1>My authentication form</h1>
        <h2>Sign in :</h2>
        <p class="errorMessage"><?= isset($_GET['error']) ? $_GET['error'] : ''; ?></p>
        <form action="signin.php" method="post">
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" required><br>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <button type="submit">Sign in</button>
        </form>
        <h2>I have an account</h2>
        <button><a href="./login.php">Log in</a></button>
    </div>
</body>

</html>