<?php
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (isset($_SESSION['registered_username']) && isset($_SESSION['registered_password']))
    {
        if ($username == $_SESSION['registered_username'] && $password == $_SESSION['registered_password'])
        {
            $_SESSION["username"] = $username; // No ID regeneration, no secure flags
            header("Location: insecureIndex.php");
            exit();
        }
        else
        {
            $errors[] = "Invalid username or password";
        }
    }
    else
    {
        echo "No registered users found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Insecure Login</title>
</head>
<body>
<form action="insecureLogin.php" method="post">
    <h2>Insecure Login</h2>

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