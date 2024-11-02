<?php
require 'secureSession.php';

if (!isset($_SESSION['username']))
{
    header("Location: secureLogin.php");
    exit();
}

echo "Welcome " . htmlentities($_SESSION['username']);
?>

<br />
<a href="secureLogout.php">Logout</a>