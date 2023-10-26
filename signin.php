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
 * Create user
 *
 * @param string $email User's email
 * @return object
 */
function createUser(string $email, string $name, string $pass)
{
    $pdo = getPDO();
    $insertQuery = "INSERT INTO `user` (`name`, `email`, `password`)
                    VALUES (:name, :email, :pass)
                    ";
    $pdoStatement = $pdo->prepare($insertQuery);
    $pdoStatement->bindValue(":email", $email);
    $pdoStatement->bindValue(":name", $name,);
    $pdoStatement->bindValue(":pass", $pass);

    if ($pdoStatement->execute()) {
        return true;
    }
    return false;
}


if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)));
    $password = $_POST['password'];
    preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-\.]).{12,}$/", $password, $matches);
   
    if (!empty($matches)) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        header("Location: index.php?error=Password must have 12 characters and at least one upper case, one lower case, one number and one special character");
        exit();
    }

    $userCreated = createUser($email, $name, $hashPassword);

    if ($userCreated) {
        header("Location: login.php");
        exit();
    } else {
        header("Location: index.php?error=Invalid name, email or password");
        exit();
    }
} else {
    header("Location: index.php?error=All fields are required!");
    exit();
}
?>
