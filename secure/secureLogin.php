<?php
require 'secureSession.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "password")
    {
        session_regenerate_id(true); //Regenerate session ID after login for added security
        $_SESSION["username"] = $username;
        header("Location: secureIndex.php");
        exit();
    }
    else
    {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Secure Login</title>
</head>
<body>
<form action="secureLogin.php" method="post">
    <h2>Secure Login</h2>

    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlentities($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required />
    <br />
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required />
    <br />

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="../register.php">Register here</a></p>

</body>
</html>
