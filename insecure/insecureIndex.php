<?php
session_start();

if (!isset($_SESSION['username']))
{
    header("Location: insecureLogin.php");
    exit();
}

echo "Welcome, " . htmlentities($_SESSION['username']);
?>

<br />
<a href="insecureLogout.php">Logout</a>