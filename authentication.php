<?php
session_start();

require 'config.php';

/**
 * Database connection
 * 
 * @return PDO
 */
function getPDO(): PDO
{
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
    $user = DB_USER;
    $password = DB_PASS;
    $pdo = null;
    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Database error connection : " . $e->getMessage();
    }
    return $pdo;
}

/**
 * Get user
 *
 * @param string $email User's email
 * @return object
 */
function getUser(string $email)
{
    $pdo = getPDO();
    $selectQuery = "SELECT * FROM `user` WHERE `email` = :email";
    $pdoStatement = $pdo->prepare($selectQuery);
    $pdoStatement->execute([
        ":email" => $email
    ]);
    return $pdoStatement->fetchObject();
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = getUser($email);

    if ($user && $user && password_verify($password, $user->password)) {
        $_SESSION['username'] = htmlentities($user->name);

        $token = bin2hex(random_bytes(32));

        setcookie('sessionID', $token, time() + 3600, '/', '', true, true);

        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=Invalid email or password");
        exit();
    }
}
?>
