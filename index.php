<?php
if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Authentication</title>
</head>
<body>
    <div>
        <h1>Welcome to Our Application!</h1>
        <p>Please choose an option to proceed:</p>

        <ul>
            <li><a href="secure/secureLogin.php">Secure Login</a></li>
            <li><a href="insecure/insecureLogin.php">Insecure Login</a></li>
            <li><a href="register.php">Register an Account</a></li>
        </ul>
    </div>
</body>
</html>