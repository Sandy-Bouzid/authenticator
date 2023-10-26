<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <p><?= isset($_GET['error']) ? $_GET['error'] : '' ;?></p>
    <form method="post" action="authentication.php">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Log in</button>
    </form>
</body>


</html>