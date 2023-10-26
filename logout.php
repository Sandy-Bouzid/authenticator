<?php
session_start();

session_destroy();

setcookie('sessionID', '', time() - 3600, '/', '', true, true);

header("Location: index.php");
exit();
?>
