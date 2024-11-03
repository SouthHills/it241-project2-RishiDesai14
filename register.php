<?php
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$errors = [];
$successMessage = '';
$isSecure = isset($_POST['secure']) && $_POST['secure'] == '1'; // Check if secure registration is requested

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($username))
    {
        $errors[] = "Username is required";
    }
    if (empty($password))
    {
        $errors[] = "Password is required";
    }
    elseif (strlen($password) < 8)
    {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Proceed with secure handling if secure registration is selected
    if (empty($errors))
    {
        if ($isSecure)
        {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $_SESSION["registered_username"] = $username; // Store username
            $_SESSION["registered_password"] = $passwordHash; // Store password
            $successMessage = "Registered successfully! (Secure registration)";
        }
        else
        {
            $_SESSION["registered_username"] = $username;
            $_SESSION["registered_password"] = $password;
            $successMessage = "Registered successfully! (Insecure registration)";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post">
        <h2>Register</h2>

        <label>
            <input type="radio" name="secure" value="1" <?= isset($_POST['secure']) ? 'checked' : '' ?>>
            Secure Registration
        </label>
        <label>
            <input type="radio" name="secure" value="0" <?= isset($_POST['secure']) ? 'checked' : '' ?>>
            Insecure Registration
        </label>
        <br />

        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlentities($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <div style="color: green;">
                <?= htmlentities($successMessage) ?>
            </div>
        <?php endif; ?>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />
        <br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
        <br />

        <button type="submit">Register</button>
    </form>

    <p>Have an account? <a href="/insecure/insecureLogin.php">Insecure Login</a> or <a href="/secure/secureLogin.php">Secure Login</a></p>

</body>
</html>